--
-- PostgreSQL database dump
--

-- Dumped from database version 12.5 (Ubuntu 12.5-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.5 (Ubuntu 12.5-0ubuntu0.20.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: example; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.example (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    status smallint DEFAULT 10 NOT NULL,
    priority integer NOT NULL
);


ALTER TABLE public.example OWNER TO law;

--
-- Name: example_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.example_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.example_id_seq OWNER TO law;

--
-- Name: example_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.example_id_seq OWNED BY public.example.id;


--
-- Name: faq; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.faq (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    text text NOT NULL,
    priority integer NOT NULL,
    created_by integer NOT NULL,
    updated_by integer NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    type character varying(255)
);


ALTER TABLE public.faq OWNER TO law;

--
-- Name: faq_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.faq_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.faq_id_seq OWNER TO law;

--
-- Name: faq_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.faq_id_seq OWNED BY public.faq.id;


--
-- Name: i18n_language; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.i18n_language (
    id integer NOT NULL,
    slug character varying(2) NOT NULL,
    title character varying(255) NOT NULL,
    rtl boolean DEFAULT false NOT NULL,
    priority integer NOT NULL,
    created_by integer NOT NULL,
    updated_by integer NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL
);


ALTER TABLE public.i18n_language OWNER TO law;

--
-- Name: i18n_language_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.i18n_language_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.i18n_language_id_seq OWNER TO law;

--
-- Name: i18n_language_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.i18n_language_id_seq OWNED BY public.i18n_language.id;


--
-- Name: i18n_message; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.i18n_message (
    id integer NOT NULL,
    language character varying(16) NOT NULL,
    translation text
);


ALTER TABLE public.i18n_message OWNER TO law;

--
-- Name: i18n_model_message; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.i18n_model_message (
    id integer NOT NULL,
    language character varying(2) NOT NULL,
    model_name character varying(255) NOT NULL,
    model_id integer NOT NULL,
    attribute character varying(255) NOT NULL,
    translation text NOT NULL
);


ALTER TABLE public.i18n_model_message OWNER TO law;

--
-- Name: i18n_model_message_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.i18n_model_message_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.i18n_model_message_id_seq OWNER TO law;

--
-- Name: i18n_model_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.i18n_model_message_id_seq OWNED BY public.i18n_model_message.id;


--
-- Name: i18n_source_message; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.i18n_source_message (
    id integer NOT NULL,
    category character varying(255),
    message text,
    created_at integer,
    updated_at integer
);


ALTER TABLE public.i18n_source_message OWNER TO law;

--
-- Name: i18n_source_message_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.i18n_source_message_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.i18n_source_message_id_seq OWNER TO law;

--
-- Name: i18n_source_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.i18n_source_message_id_seq OWNED BY public.i18n_source_message.id;


--
-- Name: manager; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.manager (
    id integer NOT NULL,
    email character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    status smallint DEFAULT 10 NOT NULL,
    role character varying(255),
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    created_by integer,
    updated_by integer
);


ALTER TABLE public.manager OWNER TO law;

--
-- Name: manager_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.manager_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.manager_id_seq OWNER TO law;

--
-- Name: manager_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.manager_id_seq OWNED BY public.manager.id;


--
-- Name: meta; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.meta (
    id integer NOT NULL,
    title character varying(255),
    description character varying(255),
    custom text,
    url character varying(1000)
);


ALTER TABLE public.meta OWNER TO law;

--
-- Name: meta_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.meta_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.meta_id_seq OWNER TO law;

--
-- Name: meta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.meta_id_seq OWNED BY public.meta.id;


--
-- Name: migration; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE public.migration OWNER TO law;

--
-- Name: practice; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.practice (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    text character varying(255) NOT NULL,
    status smallint DEFAULT 10 NOT NULL,
    priority integer NOT NULL
);


ALTER TABLE public.practice OWNER TO law;

--
-- Name: practice_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.practice_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.practice_id_seq OWNER TO law;

--
-- Name: practice_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.practice_id_seq OWNED BY public.practice.id;


--
-- Name: review; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.review (
    id integer NOT NULL,
    name character varying(30) NOT NULL,
    text character varying(1000) NOT NULL,
    status smallint DEFAULT 0,
    priority integer NOT NULL,
    created_by integer NOT NULL,
    updated_by integer NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL
);


ALTER TABLE public.review OWNER TO law;

--
-- Name: review_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.review_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.review_id_seq OWNER TO law;

--
-- Name: review_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.review_id_seq OWNED BY public.review.id;


--
-- Name: support_message; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.support_message (
    id integer NOT NULL,
    ip inet,
    email character varying(255),
    phone character varying(30),
    name character varying(255),
    message character varying(2000) NOT NULL,
    status integer NOT NULL,
    created_by integer,
    created_at integer NOT NULL,
    info jsonb
);


ALTER TABLE public.support_message OWNER TO law;

--
-- Name: support_message_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.support_message_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.support_message_id_seq OWNER TO law;

--
-- Name: support_message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.support_message_id_seq OWNED BY public.support_message.id;


--
-- Name: text; Type: TABLE; Schema: public; Owner: law
--

CREATE TABLE public.text (
    id integer NOT NULL,
    slug character varying(255) NOT NULL,
    value text NOT NULL,
    page character varying(255) NOT NULL
);


ALTER TABLE public.text OWNER TO law;

--
-- Name: text_id_seq; Type: SEQUENCE; Schema: public; Owner: law
--

CREATE SEQUENCE public.text_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.text_id_seq OWNER TO law;

--
-- Name: text_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: law
--

ALTER SEQUENCE public.text_id_seq OWNED BY public.text.id;


--
-- Name: example id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.example ALTER COLUMN id SET DEFAULT nextval('public.example_id_seq'::regclass);


--
-- Name: faq id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.faq ALTER COLUMN id SET DEFAULT nextval('public.faq_id_seq'::regclass);


--
-- Name: i18n_language id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_language ALTER COLUMN id SET DEFAULT nextval('public.i18n_language_id_seq'::regclass);


--
-- Name: i18n_model_message id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_model_message ALTER COLUMN id SET DEFAULT nextval('public.i18n_model_message_id_seq'::regclass);


--
-- Name: i18n_source_message id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_source_message ALTER COLUMN id SET DEFAULT nextval('public.i18n_source_message_id_seq'::regclass);


--
-- Name: manager id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.manager ALTER COLUMN id SET DEFAULT nextval('public.manager_id_seq'::regclass);


--
-- Name: meta id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.meta ALTER COLUMN id SET DEFAULT nextval('public.meta_id_seq'::regclass);


--
-- Name: practice id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.practice ALTER COLUMN id SET DEFAULT nextval('public.practice_id_seq'::regclass);


--
-- Name: review id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.review ALTER COLUMN id SET DEFAULT nextval('public.review_id_seq'::regclass);


--
-- Name: support_message id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.support_message ALTER COLUMN id SET DEFAULT nextval('public.support_message_id_seq'::regclass);


--
-- Name: text id; Type: DEFAULT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.text ALTER COLUMN id SET DEFAULT nextval('public.text_id_seq'::regclass);


--
-- Data for Name: example; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.example (id, title, status, priority) FROM stdin;
1	Multiple calls per week	10	0
2	Attempts to collect more than you owe	10	1
3	Criminal accusations	10	2
4	Early morning or late night calls	10	3
5	Threats of negative credit reporting	10	4
6	Collection agency lies	10	5
7	Calls to friends, neighbors, or coworkers	10	6
8	Collection calls at work	10	7
9	Use of obscene language	10	8
10	Threats of violence, lawsuit, or arrest	10	9
11	Attempts to intimidate you	10	10
12	Robocalls to your cell phone	10	11
\.


--
-- Data for Name: faq; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.faq (id, title, text, priority, created_by, updated_by, created_at, updated_at, type) FROM stdin;
3	What juridical directions work Consumer Attorneys LLP attorneys in?	Based on many years of practice and extensive legal experience of our lawyers, we provide legal services in the practice areas: Credit Reporting Errors, Consumer Finance Litigation, The Americans with Disabilities Act, Fair Debt Collection Practices Act, Fair Labor Standards Act, Securities, Antitrust, ERISA, Personal Injury. Our lawyers are always aware of all changes in the international and local legislative system.\r\n	2	1	1	1604187846	1604935170	\N
4	What is Credit Report Inaccuracies?	Credit reporting agencies sell access to your credit report when you apply for a credit card or a loan, but a significant number of reports contain incomplete, inaccurate, or false information. These errors occur when a creditor provides inaccurate information, or if a credit reporting agency mixes the information of individuals. If you were denied a credit card or loan because of errors on your credit report, we specialize in correcting these errors and litigating claims under the Fair Credit Reporting Act.	1	1	1	1604187971	1604187971	\N
5	Is my free consultation confidential?	Yes, our free consultations are totally confidential.	3	1	1	1604188036	1604188036	\N
2	When will I be responsible for attorneys fees? 	If Consumer Attorneys LLP takes your case, we will handle it on a contingency basis, and you will not pay our fees unless we win your case or settle on your behalf. Our fees will be automatically deducted from your settlement, meaning you will not pay anything out of pocket and no upfront fees are required.	5	1	1	1604187411	1604935130	\N
6	Does Consumer Attorneys LLP provide free consultations?	Free consultations are falling out of favor with some law firms, but Consumer Attorneys LLP puts the consumer first. We will put you in touch with an attorney who will discuss your situation with you free of charge to determine whether you have a potential claim for damages. 	4	1	1	1604188072	1604935206	\N
\.


--
-- Data for Name: i18n_language; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.i18n_language (id, slug, title, rtl, priority, created_by, updated_by, created_at, updated_at) FROM stdin;
1	en	English	f	1	1	1	1601402228	1617708599
\.


--
-- Data for Name: i18n_message; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.i18n_message (id, language, translation) FROM stdin;
\.


--
-- Data for Name: i18n_model_message; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.i18n_model_message (id, language, model_name, model_id, attribute, translation) FROM stdin;
\.


--
-- Data for Name: i18n_source_message; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.i18n_source_message (id, category, message, created_at, updated_at) FROM stdin;
1	app	Index	\N	\N
2	app	The requested page does not exist.	\N	\N
3	app	Translations	\N	\N
4	app	Translation	\N	\N
5	app	Actions	\N	\N
6	app	Update	\N	\N
7	app	Save	\N	\N
8	app	Language	\N	\N
9	app	Create	\N	\N
10	app	Languages	\N	\N
11	app	Search	\N	\N
12	app	Reset	\N	\N
13	app	Home	\N	\N
14	app	Logout	\N	\N
15	app	System	\N	\N
16	app	User	\N	\N
17	app	Managers	\N	\N
18	app	Ambassadors	\N	\N
19	app	Clients	\N	\N
20	app	Chats	\N	\N
21	app	Dialogs	\N	\N
22	app	Dictionaries	\N	\N
23	app	Topics	\N	\N
24	app	Content	\N	\N
25	app	Mail templates	\N	\N
26	app	About Us	\N	\N
27	app	Employee	\N	\N
28	app	Pages	\N	\N
29	app	News	\N	\N
30	app	FAQ	\N	\N
31	app	Are you sure you want to delete this item?	\N	\N
32	app	Created	\N	\N
33	app	Updated	\N	\N
34	app	Slug	\N	\N
35	app	Title	\N	\N
36	app	Rtl	\N	\N
37	app	Priority	\N	\N
38	app	Image	\N	\N
39	app	Created by	\N	\N
40	app	Updated by	\N	\N
41	app	Created at	\N	\N
42	app	Updated at	\N	\N
43	app	Model name	\N	\N
44	app	Model	\N	\N
45	app	Attribute	\N	\N
46	app	Category	\N	\N
47	app	Message	\N	\N
48	app	Size	\N	\N
49	app	Width	\N	\N
50	app	Height	\N	\N
51	app	Name	\N	\N
52	app	Alt	\N	\N
53	app	Status	\N	\N
54	app	Email	\N	\N
55	app	Auth key	\N	\N
56	app	Password hash	\N	\N
57	app	Role	\N	\N
58	app	Url	\N	\N
59	kvgrid	View	\N	\N
60	kvgrid	Update	\N	\N
61	kvgrid	Delete	\N	\N
\.


--
-- Data for Name: manager; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.manager (id, email, auth_key, password_hash, status, role, created_at, updated_at, created_by, updated_by) FROM stdin;
1	admin@example.com	FeKDPiTYK6WEk7-qZSSEn3FGLjrtn9sF	$2y$10$73MFxKQDc3mhSWij1VBg1OHXYj1j..lkN9k6AnafnL/yRnJ4k.PNW	10	admin	1601402228	1601402228	\N	\N
\.


--
-- Data for Name: meta; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.meta (id, title, description, custom, url) FROM stdin;
6				\N
7				\N
8				\N
9				\N
19	Consumer Finance Litigation | Consumer Attorneys LLP	Being harassed by debt collectors? Was your credit unfairly ruined? Contact Consumer Attorneys LLP consumer protection lawyer for help with consumer law in Brooklyn & Queens.		\N
25	Bankruptcy Reporting Errors	Bankruptcy Reporting Errors		\N
28	Employer Background Checks 	Employer Background Checks 		\N
29	Debt Collection Harassment and Abuse	Debt Collection Harassment and Abuse		\N
31	Mortgage Servicing Abuse	Mortgage Servicing Abuse		\N
33	Telemarketer Harassment			\N
45	What is chapter 7 bankruptcy | Consumer Attorneys LLP			\N
34	Robo-calls and Autodialers			\N
37	Chapter 7			\N
38	Chapter 13			\N
36	Bankruptcy	After bankruptcy your debts are discharged and you have a right to a fresh start. Call us to see if we can assist with improving your credit score		\N
27	Landlord Background Checks			\N
40	Class Actions			\N
30	Unlawful Debt Collection / Harassment			\N
32	Debt Relief and Negotiation			\N
51	Privacy Policy | Law firm Consumer Attorneys LLP			\N
18	Daniel C. Cohen : founder partner at Consumer Attorneys LLP	Daniel C. Cohen  biography. Member of both the National Association of Consumer Advocates and the National Consumer Law Center. Mr. Cohen is co-chairs the firm’s Consumer Finance Litigation practice and licensed to practice in New York and Arizona.		\N
17	Joseph H. Mizrahi: co-founder and managing partner at Consumer Attorneys LLP	Joseph H. Mizrahi biography. Admitted to practice in the Southern, Eastern and Northern federal courts in NY, Colorado and the Northern District of Illinois. Chairs its Americans with Disabilities (ADA) litigation department.		\N
16	Edward Y. Kroub: seasoned litigation partner at Consumer Attorneys LLP	Edward Y. Kroub biography. To practice law in New York admitted in 2005. Mr. Kroub worked as vice chair of the firm’s securities litigation department and in the largest plaintiffs' side class action litigation firm in the U.S.		\N
15	Yosef Steinmetz: associate at Consumer Attorneys LLP	Yosef Steinmetz biography. Represents consumers in individual and class-action lawsuits. Mr. Steinmetz earned his law degree in 2015 at Arizona State University, and he had the privilege to serve as a judicial extern of the Arizona Court of Appeals.		\N
14	Moshe Boroosan: associate at Consumer Attorneys LLP	Moshe Boroosan biography. Member of the NY State Bar Association. Mr. Boroosan worked in a leading complex litigation firm, representing individual and institutional investors in securities cases. Was the president of the Jewish Law Students Association.		\N
13	Jonathan Weiss: associate at Consumer Attorneys LLP	Jonathan Weiss biography. Member of the New York Bar. Represents the interests of consumers in individual and class-action litigation under the Fair Debt Collection Practices Act (FDCPA). Mr. Weiss earned his J.D. from St. John's University School of Law.		\N
12	Naomi Jawahar: attorney at Consumer Attorneys LLP	Naomi Jawahar biography. Member of the New York State Bar and the Southern District and Eastern District Courts of NY. Naomi was a law clerk for a Judge in New Jersey Superior Court, Criminal Division and Assistant District Attorney at the Manhattan.		\N
5	Diana Goodwin: associate at Consumer Attorneys LLP's Brooklyn office	Diana Goodwin biography. Ms. Goodwin has Juris Doctor degree, Arts degree, studied Political Science and Psychology. Is a member of the bar of the State of New York. Diana Goodwin is an associate at Consumer Attorneys LLP's Brooklyn Heights office.		\N
23	Mixed Credit Reports | Consumer Law Attorneys | Consumer Attorneys LLP	Were you blindsided by incorrect information on your credit report? Consumer Law Attorneys work with victims of mixed credit reports  to resolve the damages caused.		\N
41	Americans with Disabilities Act | Consumer Attorneys LLP ADA Compliance Attorneys	You have rights if you’ve been prevented from accessing a website. Our ADA compliance attorneys can help explain your legal options. 		\N
50	Terms of Use | Law firm Consumer Attorneys LLP			\N
42	Personal Injury | Consumer Attorneys LLP			\N
39	Data Breach Litigation | Consumer Attorneys LLP			\N
22	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.		\N
35	Spam Text and Junk Fax | Consumer Attorneys LLP			\N
56	How to Stop Robo Calls | Consumer Attorneys LLP			\N
57	How to win a debt collection lawsuit | Consumer Attorneys LLP			\N
48	How to stop text spam | Consumer Attorneys LLP			\N
55	How does a landlord do a background check | Consumer Attorneys LLP			\N
54	Which of the following situations would not violate the americans with disabilities act? | Consumer Attorneys LLP			\N
47	What is a robocall | Consumer Attorneys LLP			\N
46	What is chapter 13 bankruptcy | Consumer Attorneys LLP			\N
44	What is mortgage abuse fraud | Consumer Attorneys LLP			\N
43	How to prevent data breach and what to do victim after a data breach | Consumer Attorneys LLP			\N
58	When an employer does a background check | Consumer Attorneys LLP			\N
59	What does mixed mean on credit report deletion | Consumer Attorneys LLP			\N
60	What is a robocall and how does it work | Consumer Attorneys LLP			\N
61	test	test desc		/practice-areasd
26	Background Check Errors: Free Legal Help | Consumer Attorneys LLP	If a landlord or employer denied you a job or housing because of mistakes or errors on your background report, you may be entitled to a monetary settlement under the Fair Credit Reporting Act		\N
62	Consumer Attorneys LLP | Consumer Protection Law Firm			/
63	Bankruptcy Reporting Errorswe	Bankruptcy Reporting Errors	\N	\N
64	Bankruptcy Reporting Errorswe	Bankruptcy Reporting Errors	\N	\N
65	Bankruptcy Reporting Errorswe	Bankruptcy Reporting Errors	\N	\N
66	Bankruptcy Reporting Errorswe	Bankruptcy Reporting Errors	\N	\N
67	Bankruptcy Reporting Errorswe	Bankruptcy Reporting Errors	\N	\N
71	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
72	sdf	sdfd	\N	\N
73	sdf	sdfd	\N	\N
82	sdfdsf	sdfsdf	\N	\N
85	sdfdsf	sdfsdf	\N	\N
86	Telemarketer Harassment		\N	\N
87	Data Breach Litigation | Consumer Attorneys LLP		\N	\N
88	Background Check Errors: Free Legal Help | Consumer Attorneys LLP	If a landlord or employer denied you a job or housing because of mistakes or errors on your background report, you may be entitled to a monetary settlement under the Fair Credit Reporting Act	\N	\N
89	Consumer Finance Litigation | Consumer Attorneys LLP	Being harassed by debt collectors? Was your credit unfairly ruined? Contact Consumer Attorneys LLP consumer protection lawyer for help with consumer law in Brooklyn & Queens.	\N	\N
90	Class Actions		\N	\N
91	Personal Injury | Consumer Attorneys LLP		\N	\N
92	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
93	sdf	sdfd	\N	\N
94	Debt Collection Harassment and Abuse	Debt Collection Harassment and Abuse	\N	\N
95	sdfdsf	sdfsdf	\N	\N
96	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
97	Which of the following situations would not violate the americans with disabilities act? | Consumer Attorneys LLP		\N	\N
98	How to win a debt collection lawsuit | Consumer Attorneys LLP		\N	\N
99	How to prevent data breach and what to do victim after a data breach | Consumer Attorneys LLP		\N	\N
100	How does a landlord do a background check | Consumer Attorneys LLP		\N	\N
101	How to win a debt collection lawsuit | Consumer Attorneys LLP		\N	\N
102	How to Stop Robo Calls | Consumer Attorneys LLP		\N	\N
103	What is a robocall and how does it work | Consumer Attorneys LLP		\N	\N
104	What is a robocall | Consumer Attorneys LLP		\N	\N
105	How to stop text spam | Consumer Attorneys LLP		\N	\N
106	What is mortgage abuse fraud | Consumer Attorneys LLP		\N	\N
107	How to prevent data breach and what to do victim after a data breach | Consumer Attorneys LLP		\N	\N
108	What is chapter 7 bankruptcy | Consumer Attorneys LLP		\N	\N
109	When an employer does a background check | Consumer Attorneys LLP		\N	\N
110	What is chapter 13 bankruptcy | Consumer Attorneys LLP		\N	\N
111	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
112	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
113	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
114	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
115	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
116	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
117	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
118	sdf	sdfd	\N	\N
119	sdf	sdfd	\N	\N
120	sdf	sdfd	\N	\N
121	Bankruptcy Reporting Errorswe	Bankruptcy Reporting Errors	\N	\N
122	Bankruptcy Reporting Errorswe	Bankruptcy Reporting Errors	\N	\N
123	Bankruptcy Reporting Errorswe	Bankruptcy Reporting Errors	\N	\N
124	What is chapter 7 bankruptcy | Consumer Attorneys LLP		\N	\N
125	Naomi Jawahar: attorney at Consumer Attorneys LLP	Naomi Jawahar biography. Member of the New York State Bar and the Southern District and Eastern District Courts of NY. Naomi was a law clerk for a Judge in New Jersey Superior Court, Criminal Division and Assistant District Attorney at the Manhattan.	\N	\N
126	Moshe Boroosan: associate at Consumer Attorneys LLP	Moshe Boroosan biography. Member of the NY State Bar Association. Mr. Boroosan worked in a leading complex litigation firm, representing individual and institutional investors in securities cases. Was the president of the Jewish Law Students Association.	\N	\N
127	Yosef Steinmetz: associate at Consumer Attorneys LLP	Yosef Steinmetz biography. Represents consumers in individual and class-action lawsuits. Mr. Steinmetz earned his law degree in 2015 at Arizona State University, and he had the privilege to serve as a judicial extern of the Arizona Court of Appeals.	\N	\N
128	Edward Y. Kroub: seasoned litigation partner at Consumer Attorneys LLP	Edward Y. Kroub biography. To practice law in New York admitted in 2005. Mr. Kroub worked as vice chair of the firm’s securities litigation department and in the largest plaintiffs' side class action litigation firm in the U.S.	\N	\N
129	Daniel C. Cohen : founder partner at Consumer Attorneys LLP	Daniel C. Cohen  biography. Member of both the National Association of Consumer Advocates and the National Consumer Law Center. Mr. Cohen is co-chairs the firm’s Consumer Finance Litigation practice and licensed to practice in New York and Arizona.	\N	\N
130	What is chapter 13 bankruptcy | Consumer Attorneys LLP		\N	\N
131	What is chapter 13 bankruptcy | Consumer Attorneys LLP		\N	\N
132	What is chapter 13 bankruptcy | Consumer Attorneys LLP		\N	\N
133	What is chapter 13 bankruptcy | Consumer Attorneys LLP		\N	\N
134	What is chapter 13 bankruptcy | Consumer Attorneys LLP		\N	\N
135	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
136	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
137	Credit Reporting Errors | Consumer Attorneys LLP	Credit reports serve the valuable purpose of reporting a consumer’s financial credit-related history to companies that are considering whether to extend credit (such as a mortgage, a loan, or a credit card account) to a consumer.	\N	\N
170	Joseph H. Mizrahi: co-founder and managing partner at Consumer Attorneys LLP	Joseph H. Mizrahi biography. Admitted to practice in the Southern, Eastern and Northern federal courts in NY, Colorado and the Northern District of Illinois. Chairs its Americans with Disabilities (ADA) litigation department.	\N	\N
171	Daniel C. Cohen : founder partner at Consumer Attorneys LLP	Daniel C. Cohen  biography. Member of both the National Association of Consumer Advocates and the National Consumer Law Center. Mr. Cohen is co-chairs the firm’s Consumer Finance Litigation practice and licensed to practice in New York and Arizona.	\N	\N
172	What is chapter 13 bankruptcy | Consumer Attorneys LLP	sdfdf	\N	\N
\.


--
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.migration (version, apply_time) FROM stdin;
m000000_000000_base	1601402060
m200929_175110_init	1601402228
m200929_195234_dev	1601499678
m201006_235603_attorney_info	1602028784
m201009_095702_dev	1603023264
m201009_144504_dev	1603023264
m201018_023236_support	1603624439
m201025_104909_about	1603624535
m201031_182358_post	1604178030
m201101_093001_dev	1604245679
m201101_194350_dev	1604264828
m201105_221000_dev	1604617359
m201117_224400_dev	1605654864
m201201_125203_redirect	1606828917
m201202_081339_meta	1606901110
m201202_134045_text	1606918465
m201214_083100_article_visit	1607941505
m201214_153552_letter	1608037595
m201218_083136_comment	1608824576
m201224_144902_img	1608824576
m210302_114444_create_featured_table	1616415041
m210318_115759_images	1616415041
m210318_133108_images	1616415041
m210322_091719_text	1616415041
m210322_125618_featured	1616417830
m210323_121625_icons	1616511352
m210324_085315_dev	1616589544
m210324_123634_address	1616589626
m210331_144306_case_review_request	1617203268
m210406_075744_reviews	1617697137
m210406_100356_dev	1617703495
m210406_111001_dev	1617707971
m210406_121430_dev	1617716342
m210406_134659_practice	1617717285
m210406_140730_example	1617718457
m210407_094911_support	1617789031
\.


--
-- Data for Name: practice; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.practice (id, title, text, status, priority) FROM stdin;
1	The Law Protects You	The Fair Debt Collection Practices Act protects you from debt collector abuse. You can sue and recover up to $1,000.	10	0
2	Connect with a Lawyer	Request a free evaluation of your case and ensure your rights are not further violated by predatory collection agencies.	10	0
3	Rely on Our Experience	We make it easy to exercise your rights. We’ll sue the debt collector on your behalf – at no upfront cost to you.	10	0
\.


--
-- Data for Name: review; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.review (id, name, text, status, priority, created_by, updated_by, created_at, updated_at) FROM stdin;
14	Ashley Thompson	This law firm was so helpful! Not only did they get items removed from my credit but they got me cash in hand for something that was hurting my credit for years! I highly recommend them! They will find it, fix it and make the wrongdoers pay for it!	10	4	1	1	1604251489	1616514582
8	Danny Fuzaylov	I found Consumer Attorneys as I was browsing for a lawyer that can provide services for credit repair. I called to Daniel and he told that one of his specialties is credit repair. He took his time, explained all the details and we settled a great price.	10	5	1	1	1604237166	1616514564
9	Daniel Yakubov	Consumer Attorneys LLP IS THE BEST film I've ever encountered. The level of knowledge, honesty and experience in the field is impeccable. I would suggest anyone with any issues to turn to them for family quality experience and help.	10	2	1	1	1604246285	1616514592
10	Camille Martin	Amazing firm! I worked predominantly with Daniel which was a great experience. He was very informative and stayed in contact with me throughout my case.	10	7	1	1	1604246833	1604246987
11	Yosi Manny	Professional, courteous, efficient- are a few adjectives i’d use to describe my experience with this firm, specifically with Daniel Cohen. He thoroughly explained all and not only won my case but got me far more money from the lawsuit than expected.	10	6	1	1	1604248083	1604248083
13	Bruce Robinson	I haven’t had to deal with lawyers in the past but I was pleasantly surprised by the way they made things so easy for me. They were very knowledgeable about my case and when they said “just let us do the work” they were not exaggerating.	10	3	1	1	1604251230	1604251230
12	Diana Yakubov	I have never seen such knowledgeable people in my life. Law firm Consumer Attorneys LLP were able to address all of my concerns in a timely manner and without costing. Very polite and well mannered law office I recommend them to all my friends and family.I have never seen such knowledgeable people in my life. 	10	1	1	1	1604248502	1617716438
\.


--
-- Data for Name: support_message; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.support_message (id, ip, email, phone, name, message, status, created_by, created_at, info) FROM stdin;
1020	\N	diem.bzz@gmail.com	1234567890	John Doe	Test message test message test message test message test message\n test message test message test message test message test message test message\n test message test message test message test message test message test\n test message test message test message	2	\N	1605831892	\N
1006	\N	\N	\N	\N	Hello. If you received this message, then write this number in the telegram chat: 123	0	1	1604953917	\N
1005	\N	dan@cml.legal	6466458482	dan	why isnt this working 	2	\N	1604951937	\N
1008	\N	\N	\N	\N	Hi. Test done!	0	1	1604954161	\N
1007	\N	info@consumerattorneys.com	010100	Roman	Hello. Test!	2	\N	1604954138	\N
1001	\N	test@testmail.com	202020202	Roman	Test post	1	\N	1604154418	\N
1002	\N	roman@mail.com	01010	Roman	Test test test	1	\N	1604154539	\N
1003	\N	test@gmail.com	030303030	Test	test test test	1	\N	1604253596	\N
1004	\N	diana@cml.legal	9295754017	Diana Goodwin	Test	1	\N	1604940803	\N
1009	\N	mercedes@palisadescleaningservice.com	8455965112	Mercedes Paulus	GM, I owed a cleaning company and I'm suing a restaurant for breach of contract. I have a hearing on Tuesday and my current lawyer wants me to take a deal and I would like a second opinion. The restaurant is Bagatelle. Let me know.Thanks	1	\N	1605359420	\N
1010	\N	Stylesbynewnew@gmail.com	(252)814-0942	Crystal Mitchell	Hi i was sent a letter in the mail from a collection trying to take me to court. Can you please get back in contact with me as soon as possible.	1	\N	1605376663	\N
1027	\N	diem.bzz@gmail.com	12121212	Test User	Test message	1	\N	1606826445	\N
1012	\N	sdfdsf@sdfsd.fdsf	234r23	sdfdsf	sdfdsfsdf	10	\N	1605821995	\N
1011	\N	sddfsdf@sdfsd.fsdf	234234324	sdfdsf	sdfsdf	10	\N	1605821978	\N
1023	\N	\N	\N	\N	Reply message.	0	1	1605832447	\N
1016	\N	\N	\N	\N	answer	0	1	1605831643	\N
1015	\N	diem.bzz@gmail.com	1234567890	sdfdsfsd	dfg fdg f	2	\N	1605831539	\N
1021	\N	\N	\N	\N	sdf sdfdsf 	0	1	1605832044	\N
1022	\N	diem.bzz@gmail.com	+12345675432	Test User	Test message.	2	\N	1605832397	\N
1013	\N	stylesbynewnew@gmail.com	2528140942	Crystal Mitchell	Zwicker & Associates law firm are taking me to court 12/18/2020 for a debt collection. I have started paying them what I could back in 2019 at the time because they kept calling and and send mail and sent a police officer to my home to give me court papers. so I settle with them so I didn't have to go to court. please help me because with covid-19 its already hard as a single mother to have to go through this. i do want to pay off my debt but i cant right now.	1	\N	1605828548	\N
1014	\N	diem.bzz@gmail.com	123456789	John Doe	Test message	1	\N	1605831345	\N
1018	\N	diem.bzz@gmail.com	213456789	John Doe	test message	1	\N	1605831777	\N
1019	\N	fsdfsdf@sdfsdf.sdf	23432432434	sdfsdfsdfsd	dsfsdfsfdsfdsf	10	\N	1605831820	\N
1024	\N	domlucre@gmail.com	8032922347	Dominick McGee	I am CEO of Credit Cadabra I sent about 3 clients to you guys and none of them have an update. 	1	\N	1606103993	\N
1026	\N	\N	\N	\N	hello.	0	1	1606134914	\N
1025	\N	webmakews@gmail.com	01010101	Roman	test test tes	2	\N	1606134852	\N
1050	\N	webmakews@gmail.com	0101010	Роман	test test test	1	\N	1607022953	\N
1049	\N	test@test.com	123213123213	test test	test	1	\N	1607009946	\N
1048	\N	diem.bzz@gmail.com	1234567890	TestFirtName TestLastName	testing completed.	1	\N	1607009602	\N
1051	\N	diem.bzz@gmail.com	12345678	test user	test message	1	\N	1607071753	\N
1053	\N	mary12freeduas@gmail.com	10	Mary	Hey. I need	10	\N	1607280033	\N
1052	\N	Erikasbethmiller@yahoo.com	(949)275-1669	Erika Miller	I am seeking a new job and just learned about checking my credit report. I may have to old or incorrect items on it. However, I have a big concern regarding my past employer.  I have a lot of papers the Dentist sent to my credit \nCards that say fraudulent activity. Incorrect and also he had used my information to make a partner Type company. If he had me sign things I did not have a choice. In his documents or he would fire me. I need to know about the service and price. Also, how fast I can get data.  Al so, the employer of 20years had me market his office as the image. My name etc.  in the end he said he owned my “Miss Erika The Cowgirl” business or what to call it. They removed me from all items on the internet as possible. I was also unaware that employers could not own my Instagram or Facebook accounts,  I don’t have the information for any one to look me up I would have to send them my copies of website. Etc the employer removed. As then he said he owned Miss Erika the crew girl. I worked for the Cowboy dentists s Lancaster pa. They go to Collier Sarner wdorkshops for dentists and business/ tax. Benefits. I only see now with about 700 papers How I am unemployed and left with his papers showing he sent to places I did fraud. I am concerned. 	1	\N	1607225349	\N
1054	\N	test@gmail.com	test	Test	Test	1	\N	1607410430	\N
1055	\N	jschwa6@gmail.com	2013214076	Jeremy Schwartz	My landlord reported me to the credit unions claiming I owed them rent money but did not owe them any money per our lease.	1	\N	1607441187	\N
1056	\N	turnere40@gmail.com	4046631158	Elaine Turner	I have a judgement from when I was in a partnership but I was the guarantor. I was not served as I didn’t live nor ever live  at the address that was served	1	\N	1607562257	\N
1057	\N	flynrocker85@live.com	5309239363	James Morse	Wrong last names. Not updated info. Things on there twice lowering my score. Medical bills that shouldn’t be on there. School loans that shouldn’t be on there. Etc.	1	\N	1607611507	\N
1058	\N	morris.rankins35@gmail.com	7173199219	Morris Rankins 	Credit Bureau refuses to remove identity theft account after I submitted multiple letters along with all necessary documents. I also went to the CFPB and Experian and TransUnion failed to comply.	1	\N	1607866797	\N
1059	\N	test@gmail.com	0101010	test	test test test	10	\N	1607960675	\N
1060	\N	test@test.test	test	test	test	10	\N	1607961509	\N
1062	\N	diana@cml.legal	609-501-9957	Testfirst Testlast	blah blah	1	\N	1607986594	\N
1061	\N	diana@cml.legal	555-555-5555	Test1	test notes\n	10	\N	1607986538	\N
1068	\N	diem.bzz@gmail.com	123456789	Test	Test message	10	\N	1608070065	\N
1063	\N	fggg@fggy.ghg	Fgggg	Fggfgf	Ggghg	1	\N	1608047402	\N
1064	\N	test@dsfdf.com	324345345435	test	webFormAdditionalDetails test	1	\N	1608047706	\N
1065	\N	danielckhaimov@gmail.com	6466458482	testtwo	test test test	1	\N	1608049406	\N
1066	\N	blankenshipdrygoods@gmail.com	2034410872	Tory Lenzo	Hello,\n\nI am seeking a repossession firm to assist with repossessing items that were stolen that are owned by me retail items in bulk. they were stolen when a consignment business closed and the former company and creditors took my items that I owned and sold them. I need to repossess the items by hiring a firm to contact the parties that took the items to get an understanding of where they are and repossess them.	1	\N	1608051060	\N
1067	\N	dan@cml.legal	6466458482	dan cohen	dfr;oafgreamglreab	1	\N	1608069685	\N
1069	\N	test@sdfdsf.com	12345678	Test	Web text example message	10	\N	1608077543	\N
1071	\N	test@gmail.com	test	test	test	10	\N	1608114264	\N
1080	\N	sdfsdf@sdfsdf.dsf	232343234	test7	sdsdfsdfsfsf	10	\N	1608131020	\N
1079	\N	vasds@sdfsdfsd.fsdf	2345345345435	test6 test	dfgfdgdfgfdgfdg	10	\N	1608130780	\N
1078	\N	sdfdf@gfdgas.df	34534534	intake test5	dfgdfgdfgdf gdf gfdg 	10	\N	1608127124	\N
1077	\N	intake4@sdfdf.dff	232345232	intsake test 4	sdfsdfsdf	10	\N	1608126530	\N
1076	\N	sdfsd@asdgfg.df	23423434	intake test3	dfg dg dfg dfg dfg dfg	10	\N	1608126279	\N
1075	\N	asdasd@sdffgs.com	4543453452	intake test2	sdfdfsdfsf	10	\N	1608126207	\N
1074	\N	web@test.com	4554656	web test	Web text example	10	\N	1608126064	\N
1073	\N	test@test2.com	6754556345	test test2	test message text	10	\N	1608124384	\N
1072	\N	test@gmail.com	test	test	test	10	\N	1608117805	\N
1070	\N	test2@mail.com	342323424	test2	sdfsfsdfsd fsdf sdf dsf dsfsdf dsf 	10	\N	1608077817	\N
1081	\N	sdsdfdf@sdfsdf.dsf	234234324	weff	sdfsdfdsf	10	\N	1608131171	\N
1082	\N	sdfdsfsdf@sdfdsf.sdf	234345435345	Intake Test	Web Text example message	1	\N	1608194089	\N
1084	\N	test@gmail.com	test	test	test	1	\N	1608276532	\N
1083	\N	jcceriedavis@yahoo.com	770-776-9940	Joy Davis 	She wants to figure out her options to resolve this issue before it goes to court. They filed a claim with the court but she has not received a notice yet. This is regarding her business in Georgia, she does not want to file for bankruptcy.  	1	\N	1608223780	\N
1085	\N	luiseduardorivera19@gmail.com	787-342-6669	Luis Rivera 	I was convicted for 2 years in 2011 at a federal court, white collar crime division. I need to find out if there is possible for expungement.	1	\N	1608326259	\N
1086	\N	test@gmail.com	test	test	test	1	\N	1608554961	\N
1087	\N	gabrielle@cml.legal	646-266-9038	Nelly Davidov	Identity Theft\nNo email address was able to be provided 	1	\N	1608571474	\N
1088	\N	lancethompson8@gmail.com	516-489-1365	Lance Thompson	Has an issue with a furnisher and what they are putting on his account.	1	\N	1608576058	\N
1089	\N	test123@test.com	12345678	Test Test123	Test message text	1	\N	1608647704	\N
1090	\N	info@domainworld.com	+12548593423	Joe Miller	Notice#: 491343\nDate: 2020-12-24  \n\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\n\nYOUR DOMAIN consumerattorneys.com WILL BE TERMINATED WITHIN 24 HOURS\n\nWe have not received your payment for the renewal of your domain consumerattorneys.com\n\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain consumerattorneys.com\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: http://yourdomaindefined.xyz/?n=consumerattorneys.com&r=a&t=1608707701&p=v1\n\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN consumerattorneys.com WILL BE TERMINATED\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: http://yourdomaindefined.xyz/?n=consumerattorneys.com&r=a&t=1608707701&p=v1\n\nACT IMMEDIATELY. \n\nThe submission notification consumerattorneys.com will EXPIRE WITHIN 24 HOURS after reception of this email	1	\N	1608707703	\N
1091	\N	test@mail.com	00000	Roman	test test test	1	\N	1609231381	\N
1169	\N	sdfsdfsd@sdfds.sdf	sdfsdsf@sdfsdf.sdf	sdfsdf	fsdfsdf	0	\N	1617790103	["Asked you to pay more than owed or added interest/fees?", "Told a third party about the debt?", "Lied or threatened you?"]
1092	\N	info@domainworld.com	+12548593423	Joe Miller	Notice#: 491343\nDate: 2020-12-30  \n\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\n\nYOUR DOMAIN consumerattorneys.com WILL BE TERMINATED WITHIN 24 HOURS\n\nWe have not received your payment for the renewal of your domain consumerattorneys.com\n\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain consumerattorneys.com\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: http://yourdomaindutch.xyz/?n=consumerattorneys.com&r=a&t=1609248194&p=v1\n\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN consumerattorneys.com WILL BE TERMINATED\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: http://yourdomaindutch.xyz/?n=consumerattorneys.com&r=a&t=1609248194&p=v1\n\nACT IMMEDIATELY. \n\nThe submission notification consumerattorneys.com will EXPIRE WITHIN 24 HOURS after reception of this email	1	\N	1609248195	\N
1093	\N	sbuchinsky@consumerattorneys.com	9295755557	Shlomit Buchinsky	TEST TEST TEST!	1	\N	1609431720	\N
1094	\N	cohen@gmail.com	5556667788	dan cohen	hello	1	\N	1609793645	\N
1095	\N	mgreenfeld@fmm.com	3472898018	mendel greenfeld	i need help with collections	1	\N	1609871894	\N
1096	\N	silviarellano98@gmail.com	786-234-5122	Silvia Arellano	I see a collection account that I do not preconized. It is from Paragon Construction Services. I tried to call, but the line doesn't work. Can you help me?\nBest,\n\nSilvia 	1	\N	1609877165	\N
1097	\N	kar2168127@maricopa.edu	480-547-1634	Kail Outaw	Credit Report Issue	1	\N	1609878221	\N
1098	\N	erolag@hotmail.com	702-336-5546	Erola Grisham	Wants to dispute with Experian. Business shut down and is unable to pay and has a delinquency on his account for November and December.  	1	\N	1609945533	\N
1099	\N	tjenkins4385@hotmail.com	347-678-1097	Tyjuan Jenkins	Mr. Jenkins wants something removed from his credit account. 	1	\N	1610042398	\N
1100	\N	estherc4049@gmail.com	845-425-4049	Esther Chesin	Credit Report has issues, was unable to pay and wants assistance with credit. 	1	\N	1610043586	\N
1101	\N	gabriellekarako@gmail.com	732-962-0846	Brenda Sheehy	Collection Department lowered her score over a 6 year loan she had. She paid on time regularly except for one time. She had tried to contact them many times but they will not give her anyone to speak with. They have sent unidentified people to her home to collect from her. 	1	\N	1610059396	\N
1102	\N	test@dsfddf.sdfdf	234345345345	Test Test	Test message (duplicate testing).	10	\N	1610112673	\N
1103	\N	test@test.com	12345678	Test Test	test message 12434	10	\N	1610113920	\N
1104	\N	test@test.com	12345678	Test Test	sdf d fdsf dsf 	10	\N	1610113950	\N
1105	\N	skmurr1998@hotmail.com	973-220-1717	Adira Court 	Has an eviction status on her credit report, has been trying to clear it and wants the process sped up. 	1	\N	1610468394	\N
1106	\N	man88donus@gmail.com	15512262881	Manuel Dones	Hello, \nI need more information on how to expunge a wrongful eviction notice. My account was settle and when I went to move to another location, the eviction report was traced but was never removed or mentioned that the account was settled. Al I have is  an email,  and a record that I was still living at the residence for the remainder of my lease. 	1	\N	1610477701	\N
1107	\N	info@domainregistration.com	+1542384593234	Joe Miller	Notice#: 491343\nDate: 12 Jan 2021\n\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\n\nYOUR DOMAIN consumerattorneys.com WILL BE TERMINATED WITHIN 24 HOURS\n\nWe have not received your payment for the renewal of your domain consumerattorneys.com\n\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain consumerattorneys.com\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://registerdomains.ga\n\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN consumerattorneys.com WILL BE TERMINATED\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://registerdomains.ga\n\nACT IMMEDIATELY.\n\nThe submission notification consumerattorneys.com will EXPIRE WITHIN 24 HOURS after reception of this email.	1	\N	1610516342	\N
1108	\N	dan@cml.legal	9295754145	blain dixon	hello thank you 	1	\N	1610723370	\N
1109	\N	dan@cml.legal	9295754177	dave jones	hola dan	1	\N	1610727212	\N
1110	\N	dan@cml.legal	6466458483	jack nichols	hello	1	\N	1610730426	\N
1111	\N	valeria.burko@coral.team	0101010101	TEST RECORD	Ignore this email. \nIt's  a test email. 	1	\N	1610786628	\N
1112	\N	danielckhaimov@gmail.com	9172930712	flan shmoentest	hola bola this is a test	1	\N	1611087447	\N
1113	\N	Erlhall14@gmail.com	8109084455	Erica Hall	Threatened by debt collector to be imprisoned , sued and wage garnishment for fraud on a check and go loan from 5 years ago 	1	\N	1611256095	\N
1114	\N	test@test.com	1010101	Test	Test new test new	1	\N	1611694867	\N
1115	\N	Beth_jones2929@yahoo.com	904-452-3478	Beth Jones	I'm trying to get evictions off my credit report so that I can rent. Some are paid off one isn't. I'm homeless an need help.	1	\N	1611769552	\N
1116	\N	gsoto82@gmail.com	5616284282	George Soto	Bethesda West Hospital of west Boynton Beach, FLorida\n\nThey turned me over to collections wihtout prior billing confirmation or any communications. Also the Focus Financial Sevice collector, have informed me last nigh they will send me to collections without my 30 days notice.	1	\N	1611937303	\N
1117	\N	test@mail.com	0202020	Test	test test test	1	\N	1612777030	\N
1118	\N	bspader@gmail.com	2017243604	Bret Spader	I have been working to repair my credit over the past few months. The bureaus keep adding back incorrect information. Example, I paid off (settled) a $5k collection account on Jan 19. After I disputed the account, sending a copy of the letter showing paid, Equifax marked it as paid. Today, they changed it back to unpaid. Along with changing other items. Can you look over my entire report and see what can be done?	1	\N	1612812854	\N
1119	\N	info@domainregistercorp.com	+12548593423	Joe Miller	Notice#: 491343\nDate: 2021-02-13  \n\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\n\nYOUR DOMAIN consumerattorneys.com WILL BE TERMINATED WITHIN 24 HOURS\n\nWe have not received your payment for the renewal of your domain consumerattorneys.com\n\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain consumerattorneys.com\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domain-service.ga/?n=consumerattorneys.com&r=a&t=1613149281&p=v7\n\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN consumerattorneys.com WILL BE TERMINATED\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domain-service.ga/?n=consumerattorneys.com&r=a&t=1613149281&p=v7\n\nACT IMMEDIATELY. \n\nThe submission notification consumerattorneys.com will EXPIRE WITHIN 24 HOURS after reception of this email	1	\N	1613149283	\N
1120	\N	info@domainregistercorp.com	+12548593423	Joe Miller	Notice#: 491343\nDate: 2021-02-13  \n\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\n\nYOUR DOMAIN consumerattorneys.com WILL BE TERMINATED WITHIN 24 HOURS\n\nWe have not received your payment for the renewal of your domain consumerattorneys.com\n\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain consumerattorneys.com\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domain-service.ga/?n=consumerattorneys.com&r=a&t=1613168878&p=v7\n\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN consumerattorneys.com WILL BE TERMINATED\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domain-service.ga/?n=consumerattorneys.com&r=a&t=1613168878&p=v7\n\nACT IMMEDIATELY. \n\nThe submission notification consumerattorneys.com will EXPIRE WITHIN 24 HOURS after reception of this email	1	\N	1613168879	\N
1121	\N	scorecred9@gmail.com	897897893475874	Roman	test test test	1	\N	1613565813	\N
1122	\N	igor.konstantinov@gmail.com	213456789	Test Testuser	Test message	1	\N	1613567854	\N
1123	\N	diem.bzz@gmail.com	2334324	Test sdfdsf	sddfsdff	1	\N	1613569237	\N
1124	\N	diem.bzz@gmail.com	12234234234	Test Test221	sdf sfsd fds fsd ff 	1	\N	1613569582	\N
1125	\N	jetgirl4782@verizon.net	8136108445	Jennifer Skinner	I have refinanced my mortgage back in December 2020 with Shellpoint mortgage I have also called the to have this taken off my credit report with Transunion I have two disputes with them as well to take this off with no such luck I even have a letter that the mortgage has been settled and closed out.  My husbands credit report is correct and it is a joint account.	1	\N	1613574427	\N
1126	\N	info@domainregistercorp.com	+12548593423	Joe Miller	Notice#: 491343\nDate: 2021-02-18  \n\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\n\nYOUR DOMAIN consumerattorneys.com WILL BE TERMINATED WITHIN 24 HOURS\n\nWe have not received your payment for the renewal of your domain consumerattorneys.com\n\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain consumerattorneys.com\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainregister.ga/?n=consumerattorneys.com&r=a&t=1613614302&p=v12\n\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN consumerattorneys.com WILL BE TERMINATED\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainregister.ga/?n=consumerattorneys.com&r=a&t=1613614302&p=v12\n\nACT IMMEDIATELY. \n\nThe submission notification consumerattorneys.com will EXPIRE WITHIN 24 HOURS after reception of this email	1	\N	1613614304	\N
1127	\N	info@domainregistercorp.com	+12548593423	Joe Miller	Notice#: 491343\nDate: 2021-02-19  \n\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\n\nYOUR DOMAIN consumerattorneys.com WILL BE TERMINATED WITHIN 24 HOURS\n\nWe have not received your payment for the renewal of your domain consumerattorneys.com\n\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain consumerattorneys.com\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainregister.ga/?n=consumerattorneys.com&r=a&t=1613632414&p=v12\n\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN consumerattorneys.com WILL BE TERMINATED\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainregister.ga/?n=consumerattorneys.com&r=a&t=1613632414&p=v12\n\nACT IMMEDIATELY. \n\nThe submission notification consumerattorneys.com will EXPIRE WITHIN 24 HOURS after reception of this email	1	\N	1613632415	\N
1129	\N	info@domainregistercorp.com	+12548593423	Joe Miller	Notice#: 491343\nDate: 2021-02-19  \n\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\n\nYOUR DOMAIN consumerattorneys.com WILL BE TERMINATED WITHIN 24 HOURS\n\nWe have not received your payment for the renewal of your domain consumerattorneys.com\n\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain consumerattorneys.com\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainregister.ga/?n=consumerattorneys.com&r=a&t=1613647311&p=v12\n\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN consumerattorneys.com WILL BE TERMINATED\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainregister.ga/?n=consumerattorneys.com&r=a&t=1613647311&p=v12\n\nACT IMMEDIATELY. \n\nThe submission notification consumerattorneys.com will EXPIRE WITHIN 24 HOURS after reception of this email	1	\N	1613647312	\N
1130	\N	info@domainregistercorp.com	+12548593423	Joe Miller	Notice#: 491343\nDate: 2021-02-19  \n\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\n\nYOUR DOMAIN consumerattorneys.com WILL BE TERMINATED WITHIN 24 HOURS\n\nWe have not received your payment for the renewal of your domain consumerattorneys.com\n\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain consumerattorneys.com\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainregister.ga/?n=consumerattorneys.com&r=a&t=1613661183&p=v12\n\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN consumerattorneys.com WILL BE TERMINATED\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainregister.ga/?n=consumerattorneys.com&r=a&t=1613661183&p=v12\n\nACT IMMEDIATELY. \n\nThe submission notification consumerattorneys.com will EXPIRE WITHIN 24 HOURS after reception of this email	1	\N	1613661184	\N
1168	\N	sdfsdf@dfdsf.sdf	sdfdfs	sdfsdf	sdfsdfdsf sd fsd fsdf sddsf dsf dsf 	0	\N	1617789994	["Asked you to pay more than owed or added interest/fees?", "Told a third party about the debt?", "Did anything else that you think is illegal or unfair?"]
1170	\N	sdfsdf@sdfsdf.sdf	sdfsdfsdf	sdfdf	sdfsdf	0	\N	1617790207	["Told a third party about the debt?", "Failed to send you anything in the mail?", "Lied or threatened you?"]
1171	\N	sdfdsf@sdf.sdfsdf	fsdfsdfsdf	sdfdsfsd	sdfsdf	0	\N	1617790239	["Threatened to sue you or garnish wages?", "Asked you to pay more than owed or added interest/fees?", "Lied or threatened you?"]
1128	\N	info@domainregistercorp.com	+12548593423	Joe Miller	Notice#: 491343\nDate: 2021-02-19  \n\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\n\nYOUR DOMAIN consumerattorneys.com WILL BE TERMINATED WITHIN 24 HOURS\n\nWe have not received your payment for the renewal of your domain consumerattorneys.com\n\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain consumerattorneys.com\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainregister.ga/?n=consumerattorneys.com&r=a&t=1613636606&p=v12\n\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN consumerattorneys.com WILL BE TERMINATED\n\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainregister.ga/?n=consumerattorneys.com&r=a&t=1613636606&p=v12\n\nACT IMMEDIATELY. \n\nThe submission notification consumerattorneys.com will EXPIRE WITHIN 24 HOURS after reception of this email	1	\N	1613636608	\N
1131	\N	test@mail.com	010101010	Test	test test test test test test test test test test 	1	\N	1614069051	\N
1132	\N	makrug@comcast.net	6093157567	MaryAnn Krug	MaryAnn Krug\nmakrug@comcast.net\n6093157567	1	\N	1614098899	\N
1133	\N	bkg56@live.com	3213130059	Brian Germain	My credit score went down 46 points on Feb 5th, 2021.  The day before is was 734 and went to 688. I ran a full report everything shows n good standing. 2 changes show Bank America - balance increased by $91 and Navy Federal decreased by $220.  Not sure what that means ?\nPlease advise I see no reason why	1	\N	1614179040	\N
1134	\N	alexisberger099@gmail.com	4442227777	Mr Alexis Berger	am in need of  urgent legal assistance. I lent a family friend\nmoney and he has refused to pay back the money.I checked your profile\nand i found you are firm,reliable and capable of assisting me.\n Below is my email address:\nalexisberger099@gmail.com\n\nMr Alexis Berger  	1	\N	1614353244	\N
1135	\N	diem.bzz@gmail.com	34345345435	Sergey Test	gdf gfd gdf g	1	\N	1614604596	\N
1136	\N	brianlayliev13@gmail.com	646-492-0080	Bryant Layliev	Credit repair re paying off a credit with Capital One.	1	\N	1614964330	\N
1137	\N	joe@stsabien.com	650-505-8255	Joe	Florida Power and Light hired two debt collection services to harass me to pay for false overages on a bill accrued after I had closed my account. FPL and the Credit Collection companies were well aware of the error and still falsely reported me to the Credit Bureaus. I submitted a written dispute to the Bureaus and they failed to take action within 45 days as required by law. My 785 point credit score was reduced by 100 points to 685 due to the error and has not recovered. This has significantly impacted my financial plans and strategies.	1	\N	1615477417	\N
1138	\N	forgeaboit@verizon.net	917-939-7500	Robert Cheng	Old account with Portfolio Service, need help with debt on the account. 	1	\N	1615826675	\N
1139	\N	shawnb@adwords-cs.com	8667166032	Shawn Barrett	This is Shawn from Google AdWords, I have been unable to reach the individual that manages the Google ads account. \n\nThere has been some recent changes with AdWords that have led to some inefficiencies in your account and I would like to schedule an account review to fix them. \n\nPlease have the individual that manages the account to email me to schedule the review.This is Shawn from Google AdWords, I have been unable to reach the individual that manages the Google ads account. \n\nThere has been some recent changes with AdWords that have led to some inefficiencies in your account and I would like to schedule an account review to fix them. \n\nPlease have the individual that manages the account to email me to schedule the review.	1	\N	1615922024	\N
1140	\N	diem.bzz123@gmail.com	88006040466	Antonio Tots	sdfsdf	0	\N	1617004970	\N
1141	\N	diem.bzz123@gmail.com	88006040466	Antonio Tots	sdfsdf	0	\N	1617005033	\N
1142	\N	sdfdsf@sdfds.fdsf	88006040466	sdfdsf	sdfsdf	0	\N	1617005523	\N
1144	\N	diem.bzz123@gmail.com	88006040466	sdfdsf	sdf	0	\N	1617006521	\N
1145	\N	diem.bzz123@gmail.com	88006040466	sdfsdf	sdfdf	0	\N	1617006603	\N
1146	\N	diem.bzz123@gmail.com	88006040466	sdfdsf	sdfsdf	0	\N	1617008250	\N
1147	\N	diem.bzz123@gmail.com	88006040466	sdfdsf	sdfsdf	0	\N	1617008252	\N
1148	\N	diem.bzz@gmail.com	88006040466	sdfdsf	sdfdsf	0	\N	1617008285	\N
1149	\N	diem.bzz123@gmail.com	88006040466	sdfdf	sdf	0	\N	1617029967	\N
1143	\N	diem.bzz123@gmail.com	88006040466	sdfsdf	sdfdsf	1	\N	1617005959	\N
1150	\N	diem.bzz123@gmail.com	234234234	sdfsdfsdf	sdfsdfsdfsf	0	\N	1617203588	\N
1151	\N	diem.bzz123@gmail.com	88006040466	sdfsdfdsf	sdfdsf	0	\N	1617203657	\N
1152	\N	sdfdsf@sdfsd.fsdf	sdfsdfsdf	dsfsdf	zdfds fsd fsdf sdf sdfsdfsdfsd fsd fsdf sdf	0	\N	1617787749	\N
1153	\N	sdfdsf@sfsdf.sdf	sdfsdfsdf	sdfsdf	sdfdsf	0	\N	1617787883	\N
1154	\N	sdfsd@sdfdsf.dsf	sdfsdf	sdfsdfsdf	sdfsdfsdfsdfsdf	0	\N	1617788061	\N
1155	\N	sdfsdf@sdfds.fsdf	sdfsdfsdf	sdfdfs	sdfsdfsdf	0	\N	1617788080	\N
1156	\N	fdsfdf@sdfsd.fsdf	sdfsdfsd	sdfdsf	sdfsdf	0	\N	1617788107	\N
1157	\N	sdfdf@sdfds.fdsf	sdfdsfdsf	sdfsdf	sdfsdf	0	\N	1617788135	\N
1158	\N	sdfdsf@sdfsd.fdsf	dsfsdf	sdfsdf	sdfsdf	0	\N	1617788151	\N
1159	\N	sdfdf@sdfds.fsdf	sdfdsf	sdfdsf	sdfsdf	0	\N	1617788195	\N
1160	\N	dfsdfdf@sdfds.fdsf	dsfdsf	sdfdsf	sdfdsf	0	\N	1617788537	\N
1161	\N	sdfdsf@sdfsd.fdsf	sdfsdsdf	sdfdsf	sdfdsf	0	\N	1617788562	\N
1163	\N	dfssdfsdf@sdfds.fsdf	fsdfsdfsdf	sdfsd	sdfsdf@sdfsdf.sdf	1	\N	1617788639	\N
1162	\N	gdfgdfg@sdfsdf.dsf	fdgdfgdf	dfgdfg	sdfsdf	1	\N	1617788596	\N
1164	\N	sdfsdf@sdf.sdfsdf	fsdfdfsf	sdfsd	sdfsdf	1	\N	1617789486	["Threatened to sue you or garnish wages?", "Asked you to pay more than owed or added interest/fees?", "Failed to send you anything in the mail?"]
1172	\N	sdfdf@sdf.fsdf	dsfsdf	sfsdf	sdfsdff	0	\N	1617790398	["Told a third party about the debt?", "Failed to send you anything in the mail?"]
1173	\N	sdfdfsdf@asdfsdf.sdf	sdfsdfsdf	sdfsdfdsf	sdfsdfsdf	0	\N	1617790428	["Threatened to sue you or garnish wages?", "Told a third party about the debt?", "Failed to send you anything in the mail?"]
\.


--
-- Data for Name: text; Type: TABLE DATA; Schema: public; Owner: law
--

COPY public.text (id, slug, value, page) FROM stdin;
1	logo-title-1	PERSONAL	header
2	logo-title-2	LAWYER	header
3	menu-1	YOUR RIGHTS	header
5	menu-3	FAQ	header
4	menu-2	HOW IT WORKS	header
6	menu-4	REVIEWS	header
7	menu-5	CONTACT US	header
8	phone-btn-title	CALL NOW	header
9	phone-btn-value	203-123-4567	header
10	main-title	HARASSED BY\r\nCREDITORS?	first
11	main-note	YOU COULD BE ENTITLED\r\nTO COMPENSATION.	first
12	phone-title	CALL FOR FREE\r\nLEGAL ADVICE NOW:	first
13	phone-number	800-604-0466	first
14	form-first-title-1	ECEIVE A	first
15	form-first-title-2	100% FREE\r\nLEGAL CONSULTATION	first
16	form-first-note	Has a debt collector done any of the following?	first
17	form-first-question-1	Has a debt collector done any of the following?	first
18	form-first-question-2	Threatened to sue you or garnish wages?	first
19	form-first-question-3	Asked you to pay more than owed or added interest/fees?	first
20	form-first-question-4	Told a third party about the debt?	first
21	form-first-question-5	Failed to send you anything in the mail?	first
22	form-first-question-6	Lied or threatened you?	first
23	form-first-question-7	Did anything else that you think is illegal or unfair?	first
24	form-second-title-1	LAST STEP FOR YOUR	first
25	form-second-title-2	FREE CONSULTATION	first
26	form-second-note	Please fill out your contact information.	first
27	form-second-button	Get Free Help	first
28	form-second-description	Your information is confidential. We do not spam, or sell your info.	first
32	title	EXAMPLES OF\r\nILLEGAL HARASSMENT	third
29	title	YOUR RIGHTS	second
30	note	You Are Protected By the FDCPA	second
31	description	The Fair Debt Collection Practices Act (FDCPA) was passed by congress in 1977 to protect innocent people like you from being abused through unfair debt collection practices. The Federal Trade Commission, which is the nation's largest and powerful consumer protection agency, enforces the Fair Debt Collection Practices Act, ensuring that debt collectors do not use abusive, unfair, or deceptive practices to collect debts.	second
33	title-1	YOU CAN FIGHT BACK	fourth
34	title-2	YOU SHOULD FIGHT BACK	fourth
35	note	Get legal help with zero out-of-pocket expense because debt collectors have to pay your legal fees when they violate the law.	fourth
36	title	QUESTIONS YOU\r\nCOULD BE ASKING	fifth
37	title	WHAT OUR CLIENTS\r\nARE SAYING	sixth
38	title	LEGAL HELP\r\nTHAT’S FREE\r\nFOR YOU	seventh
39	note	JUST A PHONE CALL AWAY\r\nWHAT DO YOU HAVE TO LOSE?	seventh
40	phone	800-604-0466	seventh
41	form-title-1	BE IN TOUCH!	seventh
42	form-title-2	FREE CONSULTATION	seventh
43	form-note	Please fill out your contact information.	seventh
44	form-description	Your information is confidential. We do not spam, or sell your info.	seventh
45	form-button	Get Free Help	seventh
46	note-1	"Domaine" is not a lawyer or law firm. This website is attorney advertising: prior results do not guarantee a similar outcome. The website is operated by Results Marketing for Consumer Attorneys LLP. It is an advertising service paid for by the lawyers and advocates whose names are provided in response to user requests and it is not an attorney referral service.	eighth
47	note-2	By requesting a free evaluation, the user will be provided with the name of an independent lawyer or advocate who will contact the user to do the evaluation. Do not assume that you are entitled to any compensation as a result of your debt collector harassment. Compensation, and any results obtained, depends upon the specific factual and legal circumstances of each case. By submitting a free evaluation, I acknowledge that I understand and agree to the disclaimer and privacy policy.	eighth
48	title	© Consumer Attorneys LLP	footer
\.


--
-- Name: example_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.example_id_seq', 12, true);


--
-- Name: faq_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.faq_id_seq', 38, true);


--
-- Name: i18n_language_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.i18n_language_id_seq', 2, true);


--
-- Name: i18n_model_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.i18n_model_message_id_seq', 7, true);


--
-- Name: i18n_source_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.i18n_source_message_id_seq', 61, true);


--
-- Name: manager_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.manager_id_seq', 1, true);


--
-- Name: meta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.meta_id_seq', 172, true);


--
-- Name: practice_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.practice_id_seq', 3, true);


--
-- Name: review_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.review_id_seq', 14, true);


--
-- Name: support_message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.support_message_id_seq', 1173, true);


--
-- Name: text_id_seq; Type: SEQUENCE SET; Schema: public; Owner: law
--

SELECT pg_catalog.setval('public.text_id_seq', 48, true);


--
-- Name: example example_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.example
    ADD CONSTRAINT example_pkey PRIMARY KEY (id);


--
-- Name: example example_title_key; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.example
    ADD CONSTRAINT example_title_key UNIQUE (title);


--
-- Name: faq faq_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.faq
    ADD CONSTRAINT faq_pkey PRIMARY KEY (id);


--
-- Name: i18n_language i18n_language_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_language
    ADD CONSTRAINT i18n_language_pkey PRIMARY KEY (id);


--
-- Name: i18n_language i18n_language_slug_key; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_language
    ADD CONSTRAINT i18n_language_slug_key UNIQUE (slug);


--
-- Name: i18n_language i18n_language_title_key; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_language
    ADD CONSTRAINT i18n_language_title_key UNIQUE (title);


--
-- Name: i18n_model_message i18n_model_message_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_model_message
    ADD CONSTRAINT i18n_model_message_pkey PRIMARY KEY (id);


--
-- Name: i18n_source_message i18n_source_message_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_source_message
    ADD CONSTRAINT i18n_source_message_pkey PRIMARY KEY (id);


--
-- Name: manager manager_email_key; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.manager
    ADD CONSTRAINT manager_email_key UNIQUE (email);


--
-- Name: manager manager_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.manager
    ADD CONSTRAINT manager_pkey PRIMARY KEY (id);


--
-- Name: meta meta_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.meta
    ADD CONSTRAINT meta_pkey PRIMARY KEY (id);


--
-- Name: meta meta_url_key; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.meta
    ADD CONSTRAINT meta_url_key UNIQUE (url);


--
-- Name: migration migration_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- Name: i18n_message pk-i18n_message-id-language; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_message
    ADD CONSTRAINT "pk-i18n_message-id-language" PRIMARY KEY (id, language);


--
-- Name: practice practice_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.practice
    ADD CONSTRAINT practice_pkey PRIMARY KEY (id);


--
-- Name: practice practice_title_key; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.practice
    ADD CONSTRAINT practice_title_key UNIQUE (title);


--
-- Name: review review_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.review
    ADD CONSTRAINT review_pkey PRIMARY KEY (id);


--
-- Name: support_message support_message_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.support_message
    ADD CONSTRAINT support_message_pkey PRIMARY KEY (id);


--
-- Name: text text_pkey; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.text
    ADD CONSTRAINT text_pkey PRIMARY KEY (id);


--
-- Name: text unq-text-page-slug-key; Type: CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.text
    ADD CONSTRAINT "unq-text-page-slug-key" UNIQUE (page, slug);


--
-- Name: idx-i18n_message-language; Type: INDEX; Schema: public; Owner: law
--

CREATE INDEX "idx-i18n_message-language" ON public.i18n_message USING btree (language);


--
-- Name: idx-i18n_model_message-language-model_name-model_id; Type: INDEX; Schema: public; Owner: law
--

CREATE INDEX "idx-i18n_model_message-language-model_name-model_id" ON public.i18n_model_message USING btree (language, model_name, model_id);


--
-- Name: idx-i18n_source_message-category; Type: INDEX; Schema: public; Owner: law
--

CREATE INDEX "idx-i18n_source_message-category" ON public.i18n_source_message USING btree (category);


--
-- Name: unq-i18n_model_message-language-model_name-model_id-attribute; Type: INDEX; Schema: public; Owner: law
--

CREATE UNIQUE INDEX "unq-i18n_model_message-language-model_name-model_id-attribute" ON public.i18n_model_message USING btree (language, model_name, model_id, attribute);


--
-- Name: faq fk-faq-created_by; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.faq
    ADD CONSTRAINT "fk-faq-created_by" FOREIGN KEY (created_by) REFERENCES public.manager(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: faq fk-faq-updated_by; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.faq
    ADD CONSTRAINT "fk-faq-updated_by" FOREIGN KEY (updated_by) REFERENCES public.manager(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: i18n_language fk-i18n_language-created_by; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_language
    ADD CONSTRAINT "fk-i18n_language-created_by" FOREIGN KEY (created_by) REFERENCES public.manager(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: i18n_language fk-i18n_language-updated_by; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_language
    ADD CONSTRAINT "fk-i18n_language-updated_by" FOREIGN KEY (updated_by) REFERENCES public.manager(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: i18n_message fk-i18n_message-id; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_message
    ADD CONSTRAINT "fk-i18n_message-id" FOREIGN KEY (id) REFERENCES public.i18n_source_message(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: i18n_message fk-i18n_message-language; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_message
    ADD CONSTRAINT "fk-i18n_message-language" FOREIGN KEY (language) REFERENCES public.i18n_language(slug) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: i18n_model_message fk-i18n_model_message-language; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.i18n_model_message
    ADD CONSTRAINT "fk-i18n_model_message-language" FOREIGN KEY (language) REFERENCES public.i18n_language(slug) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: manager fk-manager-created_by; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.manager
    ADD CONSTRAINT "fk-manager-created_by" FOREIGN KEY (created_by) REFERENCES public.manager(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: manager fk-manager-updated_by; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.manager
    ADD CONSTRAINT "fk-manager-updated_by" FOREIGN KEY (updated_by) REFERENCES public.manager(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: review fk-review-created_by; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.review
    ADD CONSTRAINT "fk-review-created_by" FOREIGN KEY (created_by) REFERENCES public.manager(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: review fk-review-updated_by; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.review
    ADD CONSTRAINT "fk-review-updated_by" FOREIGN KEY (updated_by) REFERENCES public.manager(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- Name: support_message fk-support_message-created_by; Type: FK CONSTRAINT; Schema: public; Owner: law
--

ALTER TABLE ONLY public.support_message
    ADD CONSTRAINT "fk-support_message-created_by" FOREIGN KEY (created_by) REFERENCES public.manager(id) ON UPDATE RESTRICT ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

