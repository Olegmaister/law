<?php

/* @var $this yii\web\View */
/* @var $backend bool */
/* @var $frontend bool */

$this->title = Yii::t('app', 'Deploy');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row sys-index">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-body">
                <button type="button"
                        class="btn btn-lg btn-success sys-index-btn-frontend" data-action="frontend"
                        data-toggle="modal" data-target="#sys-modal" <?= !$frontend ? 'disabled' : '' ?>>Frontend
                </button>
                <button type="button"
                        class="btn btn-lg btn-danger sys-index-btn-backend" data-action="backend"
                        data-toggle="modal" data-target="#sys-modal" <?= !$backend ? 'disabled' : '' ?>>Backend
                </button>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="sys-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Deploy</h4>
                <button type="button" class="close sys-modal-close" data-dismiss="modal" style="display: none">&times;
                </button>
            </div>
            <div class="modal-body">
                <pre id="sys-modal-stream"></pre>
            </div>
            <div class="modal-footer">
                <button type="button"
                        data-dismiss="modal"
                        class="btn btn-success sys-modal-btn-success"
                        style="display: none">Ok
                </button>
                <button type="button"
                        data-dismiss="modal"
                        class="btn btn-danger sys-modal-btn-error"
                        style="display: none">Close
                </button>
            </div>
        </div>
    </div>
</div>
<style>
    .sys-index .card-body {
        text-align: center;
        vertical-align: center;
        line-height: 100px;
        min-height: 100px;
    }
</style>

<script>
    $(() => {
        let xhr;

        $('.sys-index-btn-frontend').add($('.sys-index-btn-backend')).click(function () {
            $(this).attr('disabled', true);
            const action = $(this).data('action');
            if (xhr) {
                xhr.abort();
                xhr = null;
            }

            $('.sys-modal-btn-success').hide();
            $('.sys-modal-btn-error').hide();
            $('.sys-modal-close').hide();

            stream('/sys/' + action, '#sys-modal-stream', () => {
                $('.sys-modal-btn-success').show();
                $('.sys-modal-close').show();
            }, () => {
                $('.sys-modal-btn-error').show();
                $('.sys-modal-close').show();
            });
        });

        function stream(uri, selector, success, fail) {
            $(selector).text('');
            $.get(uri, (response) => {
                const data = JSON.parse(response);
                if (!data || Number(data.status) !== 0) {
                    $(selector).text('Error: ' + data.output);
                    fail();
                } else {
                    $(selector).text('Deploying successfully started.');
                    success();
                }
            });
        }

        setInterval(() => {
            xhr && xhr.abort();
            xhr = $.get('/sys/check', (body) => {
                const data = JSON.parse(body);
                $('.sys-index-btn-backend').attr('disabled', !data['backend']);
                $('.sys-index-btn-frontend').attr('disabled', !data['frontend']);
                xhr = null;
            });
        }, 2000);
    })
</script>