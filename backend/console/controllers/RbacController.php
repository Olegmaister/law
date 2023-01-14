<?php

namespace console\controllers;

use common\models\Manager;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public $defaultAction = 'init';
    protected $i18n;

    public function actionInit()
    {
        $this->clear();
        $this->exec();
    }

    protected function exec()
    {
        /////////////////
        // Permissions //
        /////////////////

        $i18n = $this->crud('i18n', ['read', 'write']);
        $this->i18n = $i18n[null];

        $pms['site'] = $this->crud('site', ['read']);
        $pms += $this->crudArray([
            'language',
            'faq',
            'meta',
            'review',
            'support',
            'practice',
            'example',
            'text',
        ]);

        $pms += $this->permissionArray([
            'sys', 'layout'
        ]);

        ///////////
        // Roles //
        ///////////

        $admin = $this->role(Manager::ROLE_ADMIN);

        foreach ($pms as $pm) {
            $this->set($admin, $pm);
        }

        $translator = $this->role('translator');
        $this->set($translator, $this->i18n);

        $stat = $this->role('stat');
        $this->set($stat, $pms['support']);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    protected $assignments = [];

    /**
     * Clear all
     */
    protected function clear()
    {
        $man = Yii::$app->authManager;
        $man->removeAll();
    }

    /**
     * Create role
     *
     * @param $name
     * @return \yii\rbac\Role
     * @throws \Exception
     */
    protected function role($name)
    {
        $man = Yii::$app->authManager;
        $role = $man->createRole($name);
        $man->add($role);
        return $role;
    }

    /**
     * Create permission
     *
     * @param $name
     * @return \yii\rbac\Permission
     * @throws \Exception
     */
    protected function permission($name)
    {
        $man = Yii::$app->authManager;
        $permission = $man->createPermission($name);
        $man->add($permission);
        return $permission;
    }

    /**
     * Create CRUD permissions
     *
     * @param string $controller
     * @param array $permissions
     * @return array
     * @throws \yii\base\Exception
     */
    protected function crud($controller, $permissions = ['read', 'i18n', 'write'])
    {
        $result = [];
        $man = Yii::$app->authManager;
        $man->add($result[null] = $man->createPermission($controller));

        foreach ($permissions as $item) {
            $permission = $man->createPermission($controller . '-' . $item);
            $man->add($permission);
            $man->addChild($result[null], $permission);
            $result[$item] = $permission;
        }

        if (!empty($result['i18n'])) {
            $man->addChild($this->i18n, $result['i18n']);
            if (!empty($result['read'])) {
                $man->addChild($result['i18n'], $result['read']);
            }
        }

        if (!empty($result['write'])) {
            if (!empty($result['i18n'])) {
                $man->addChild($result['write'], $result['i18n']);
            }
        }

        return $result;
    }

    protected function crudArray($names)
    {
        $result = [];
        foreach ($names as $name) {
            $result[$name] = $this->crud($name);
        }
        return $result;
    }

    protected function permissionArray($names)
    {
        $result = [];
        foreach ($names as $name) {
            $result[$name] = $this->permission($name);
        }
        return $result;
    }

    /**
     * Add permission(s) to role
     *
     * @param $role
     * @param $permissions
     * @param array $actions
     * @throws \yii\base\Exception
     */
    protected function set($role, $permissions, $actions = [null])
    {
        $man = Yii::$app->authManager;

        if (!is_array($permissions)) {
            $man->addChild($role, $permissions);
        } else {
            foreach ($actions as $action) {
                $man->addChild($role, $permissions[$action]);
            }
        }
    }
}