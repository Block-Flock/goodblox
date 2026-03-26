--
-- PostgreSQL database dump
--

\restrict Iz96bU3kEdv7uspO3nQXR6NKz9SCPrlxG10fVLNaYaiLP6T0J3lpRLWxsSZ1yes

-- Dumped from database version 16.10
-- Dumped by pg_dump version 16.10

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
-- Name: achievements; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.achievements (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description text DEFAULT ''::text,
    image character varying(255) DEFAULT ''::character varying
);


ALTER TABLE public.achievements OWNER TO postgres;

--
-- Name: achievements_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.achievements_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.achievements_id_seq OWNER TO postgres;

--
-- Name: achievements_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.achievements_id_seq OWNED BY public.achievements.id;


--
-- Name: assets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.assets (
    id integer NOT NULL,
    name character varying(255) DEFAULT ''::character varying,
    type character varying(50) DEFAULT ''::character varying,
    filename character varying(255) DEFAULT ''::character varying,
    creator integer DEFAULT 0,
    sales integer DEFAULT 0
);


ALTER TABLE public.assets OWNER TO postgres;

--
-- Name: assets_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.assets_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.assets_id_seq OWNER TO postgres;

--
-- Name: assets_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.assets_id_seq OWNED BY public.assets.id;


--
-- Name: avatar_cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.avatar_cache (
    id integer NOT NULL,
    userid integer NOT NULL,
    cache text DEFAULT ''::text,
    last_updated bigint DEFAULT 0
);


ALTER TABLE public.avatar_cache OWNER TO postgres;

--
-- Name: avatar_cache_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.avatar_cache_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.avatar_cache_id_seq OWNER TO postgres;

--
-- Name: avatar_cache_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.avatar_cache_id_seq OWNED BY public.avatar_cache.id;


--
-- Name: catalog; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.catalog (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description text DEFAULT ''::text,
    type character varying(50) DEFAULT 'hat'::character varying,
    price integer DEFAULT 0,
    tix integer DEFAULT 0,
    robux integer DEFAULT 0,
    currency character varying(20) DEFAULT 'tix'::character varying,
    buywith character varying(20) DEFAULT 'tix'::character varying,
    creatorid integer DEFAULT 0,
    thumbnail text DEFAULT ''::text,
    sales integer DEFAULT 0,
    is_limited integer DEFAULT 0,
    total_stock integer DEFAULT 0,
    onsale_until bigint DEFAULT 0,
    datecreated bigint DEFAULT 0,
    filename character varying(255) DEFAULT ''::character varying,
    is_forsale integer DEFAULT 1
);


ALTER TABLE public.catalog OWNER TO postgres;

--
-- Name: catalog_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.catalog_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.catalog_id_seq OWNER TO postgres;

--
-- Name: catalog_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.catalog_id_seq OWNED BY public.catalog.id;


--
-- Name: comments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.comments (
    id integer NOT NULL,
    userid integer NOT NULL,
    assetid integer NOT NULL,
    content text DEFAULT ''::text,
    time_posted bigint DEFAULT 0
);


ALTER TABLE public.comments OWNER TO postgres;

--
-- Name: comments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.comments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.comments_id_seq OWNER TO postgres;

--
-- Name: comments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.comments_id_seq OWNED BY public.comments.id;


--
-- Name: forum; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.forum (
    id integer NOT NULL,
    title character varying(255) DEFAULT ''::character varying,
    content text DEFAULT ''::text,
    author integer DEFAULT 0,
    category integer DEFAULT 0,
    reply_to integer DEFAULT 0,
    time_posted bigint DEFAULT 0,
    is_pinned integer DEFAULT 0
);


ALTER TABLE public.forum OWNER TO postgres;

--
-- Name: forum_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.forum_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.forum_id_seq OWNER TO postgres;

--
-- Name: forum_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.forum_id_seq OWNED BY public.forum.id;


--
-- Name: forumgroups; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.forumgroups (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description text DEFAULT ''::text,
    category integer DEFAULT 0
);


ALTER TABLE public.forumgroups OWNER TO postgres;

--
-- Name: forumgroups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.forumgroups_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.forumgroups_id_seq OWNER TO postgres;

--
-- Name: forumgroups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.forumgroups_id_seq OWNED BY public.forumgroups.id;


--
-- Name: friends; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.friends (
    id integer NOT NULL,
    user_from integer NOT NULL,
    user_to integer NOT NULL,
    arefriends integer DEFAULT 0,
    hash character varying(255) DEFAULT ''::character varying
);


ALTER TABLE public.friends OWNER TO postgres;

--
-- Name: friends_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.friends_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.friends_id_seq OWNER TO postgres;

--
-- Name: friends_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.friends_id_seq OWNED BY public.friends.id;


--
-- Name: games; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.games (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description text DEFAULT ''::text,
    thumbnail text DEFAULT ''::text,
    creator_id integer NOT NULL,
    ip character varying(100) DEFAULT ''::character varying,
    port integer DEFAULT 0,
    players integer DEFAULT 0,
    defaultmapfilename character varying(255) DEFAULT ''::character varying
);


ALTER TABLE public.games OWNER TO postgres;

--
-- Name: games_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.games_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.games_id_seq OWNER TO postgres;

--
-- Name: games_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.games_id_seq OWNED BY public.games.id;


--
-- Name: gamesvisits; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.gamesvisits (
    id integer NOT NULL,
    gameid integer NOT NULL,
    visitorid integer NOT NULL
);


ALTER TABLE public.gamesvisits OWNER TO postgres;

--
-- Name: gamesvisits_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.gamesvisits_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.gamesvisits_id_seq OWNER TO postgres;

--
-- Name: gamesvisits_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.gamesvisits_id_seq OWNED BY public.gamesvisits.id;


--
-- Name: global; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.global (
    id integer NOT NULL,
    sitename character varying(100) DEFAULT 'GoodBlox'::character varying,
    maintenance integer DEFAULT 0,
    shutdown_message text DEFAULT ''::text,
    "SiteAlert1" text DEFAULT ''::text,
    "SiteAlert1Color" character varying(50) DEFAULT '#ffffff'::character varying,
    "ShowingSiteAlert1" character varying(10) DEFAULT 'no'::character varying,
    "SiteAlert2" text DEFAULT ''::text,
    "SiteAlert2Color" character varying(50) DEFAULT '#ffffff'::character varying,
    "ShowingSiteAlert2" character varying(10) DEFAULT 'no'::character varying,
    "SiteAlert3" text DEFAULT ''::text,
    "SiteAlert3Color" character varying(50) DEFAULT '#ffffff'::character varying,
    "ShowingSiteAlert3" character varying(10) DEFAULT 'no'::character varying,
    "SiteAlert4" text DEFAULT ''::text,
    "SiteAlert4Color" character varying(50) DEFAULT '#ffffff'::character varying,
    "ShowingSiteAlert4" character varying(10) DEFAULT 'no'::character varying,
    "SiteAlert5" text DEFAULT ''::text,
    "SiteAlert5Color" character varying(50) DEFAULT '#ffffff'::character varying,
    "ShowingSiteAlert5" character varying(10) DEFAULT 'no'::character varying,
    "maintenanceEnabled" character varying(10) DEFAULT 'no'::character varying
);


ALTER TABLE public.global OWNER TO postgres;

--
-- Name: global_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.global_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.global_id_seq OWNER TO postgres;

--
-- Name: global_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.global_id_seq OWNED BY public.global.id;


--
-- Name: limited_sales; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.limited_sales (
    id integer NOT NULL,
    item_id integer NOT NULL,
    price integer DEFAULT 0,
    buyer_id integer DEFAULT 0,
    seller_id integer DEFAULT 0,
    time_sold bigint DEFAULT 0
);


ALTER TABLE public.limited_sales OWNER TO postgres;

--
-- Name: limited_sales_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.limited_sales_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.limited_sales_id_seq OWNER TO postgres;

--
-- Name: limited_sales_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.limited_sales_id_seq OWNED BY public.limited_sales.id;


--
-- Name: messages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.messages (
    id integer NOT NULL,
    user_from integer NOT NULL,
    user_to integer NOT NULL,
    subject character varying(255) DEFAULT ''::character varying,
    body text DEFAULT ''::text,
    time_sent bigint DEFAULT 0,
    readto integer DEFAULT 0
);


ALTER TABLE public.messages OWNER TO postgres;

--
-- Name: messages_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.messages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.messages_id_seq OWNER TO postgres;

--
-- Name: messages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.messages_id_seq OWNED BY public.messages.id;


--
-- Name: owned_achievements; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.owned_achievements (
    id integer NOT NULL,
    user_id integer NOT NULL,
    achievement_id integer NOT NULL
);


ALTER TABLE public.owned_achievements OWNER TO postgres;

--
-- Name: owned_achievements_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.owned_achievements_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.owned_achievements_id_seq OWNER TO postgres;

--
-- Name: owned_achievements_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.owned_achievements_id_seq OWNED BY public.owned_achievements.id;


--
-- Name: owned_items; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.owned_items (
    id integer NOT NULL,
    itemid integer NOT NULL,
    ownerid integer NOT NULL,
    type character varying(50) DEFAULT ''::character varying
);


ALTER TABLE public.owned_items OWNER TO postgres;

--
-- Name: owned_items_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.owned_items_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.owned_items_id_seq OWNER TO postgres;

--
-- Name: owned_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.owned_items_id_seq OWNED BY public.owned_items.id;


--
-- Name: owneditems; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.owneditems (
    id integer NOT NULL,
    userid integer NOT NULL,
    assetid integer NOT NULL,
    type character varying(50) DEFAULT ''::character varying
);


ALTER TABLE public.owneditems OWNER TO postgres;

--
-- Name: owneditems_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.owneditems_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.owneditems_id_seq OWNER TO postgres;

--
-- Name: owneditems_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.owneditems_id_seq OWNED BY public.owneditems.id;


--
-- Name: pageviews; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pageviews (
    id integer NOT NULL,
    userid integer NOT NULL,
    ip character varying(255) NOT NULL
);


ALTER TABLE public.pageviews OWNER TO postgres;

--
-- Name: pageviews_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pageviews_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pageviews_id_seq OWNER TO postgres;

--
-- Name: pageviews_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pageviews_id_seq OWNED BY public.pageviews.id;


--
-- Name: reports; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reports (
    id integer NOT NULL,
    userid integer NOT NULL,
    reason text DEFAULT ''::text,
    reported_user integer DEFAULT 0,
    time_reported bigint DEFAULT 0
);


ALTER TABLE public.reports OWNER TO postgres;

--
-- Name: reports_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.reports_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.reports_id_seq OWNER TO postgres;

--
-- Name: reports_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.reports_id_seq OWNED BY public.reports.id;


--
-- Name: topics; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.topics (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description text DEFAULT ''::text,
    category integer DEFAULT 0
);


ALTER TABLE public.topics OWNER TO postgres;

--
-- Name: topics_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.topics_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.topics_id_seq OWNER TO postgres;

--
-- Name: topics_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.topics_id_seq OWNED BY public.topics.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(50) NOT NULL,
    email character varying(255),
    password character varying(255),
    referral character varying(50) DEFAULT ''::character varying,
    robux integer DEFAULT 0,
    tix integer DEFAULT 10,
    thumbnail text DEFAULT ''::text,
    blurb text DEFAULT ''::text,
    bc character varying(20) DEFAULT 'None'::character varying,
    bcexpire character varying(50) DEFAULT ''::character varying,
    membership_type character varying(20) DEFAULT 'NONE'::character varying,
    next_tix_reward bigint DEFAULT 0,
    next_bricks_award bigint DEFAULT 0,
    lastseen bigint DEFAULT 0,
    time_joined bigint DEFAULT 0,
    ip character varying(255) DEFAULT ''::character varying,
    bantype character varying(50) DEFAULT ''::character varying,
    banreason text DEFAULT ''::text,
    bandate character varying(50) DEFAULT ''::character varying,
    unbantime character varying(100) DEFAULT ''::character varying,
    is_banned integer DEFAULT 0,
    accountcode character varying(100) DEFAULT ''::character varying,
    avatar_hash character varying(255) DEFAULT ''::character varying,
    headcolor character varying(20) DEFAULT '255 255 255'::character varying,
    torsocolor character varying(20) DEFAULT '255 255 255'::character varying,
    leftarmcolor character varying(20) DEFAULT '255 255 255'::character varying,
    rightarmcolor character varying(20) DEFAULT '255 255 255'::character varying,
    leftlegcolor character varying(20) DEFAULT '255 255 255'::character varying,
    rightlegcolor character varying(20) DEFAULT '255 255 255'::character varying,
    user_permissions character varying(50) DEFAULT 'user'::character varying
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: wearing; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.wearing (
    id integer NOT NULL,
    userid integer NOT NULL,
    itemid integer NOT NULL,
    type character varying(50) DEFAULT ''::character varying
);


ALTER TABLE public.wearing OWNER TO postgres;

--
-- Name: wearing_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.wearing_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.wearing_id_seq OWNER TO postgres;

--
-- Name: wearing_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.wearing_id_seq OWNED BY public.wearing.id;


--
-- Name: achievements id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.achievements ALTER COLUMN id SET DEFAULT nextval('public.achievements_id_seq'::regclass);


--
-- Name: assets id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assets ALTER COLUMN id SET DEFAULT nextval('public.assets_id_seq'::regclass);


--
-- Name: avatar_cache id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.avatar_cache ALTER COLUMN id SET DEFAULT nextval('public.avatar_cache_id_seq'::regclass);


--
-- Name: catalog id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalog ALTER COLUMN id SET DEFAULT nextval('public.catalog_id_seq'::regclass);


--
-- Name: comments id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments ALTER COLUMN id SET DEFAULT nextval('public.comments_id_seq'::regclass);


--
-- Name: forum id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.forum ALTER COLUMN id SET DEFAULT nextval('public.forum_id_seq'::regclass);


--
-- Name: forumgroups id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.forumgroups ALTER COLUMN id SET DEFAULT nextval('public.forumgroups_id_seq'::regclass);


--
-- Name: friends id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.friends ALTER COLUMN id SET DEFAULT nextval('public.friends_id_seq'::regclass);


--
-- Name: games id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.games ALTER COLUMN id SET DEFAULT nextval('public.games_id_seq'::regclass);


--
-- Name: gamesvisits id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gamesvisits ALTER COLUMN id SET DEFAULT nextval('public.gamesvisits_id_seq'::regclass);


--
-- Name: global id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.global ALTER COLUMN id SET DEFAULT nextval('public.global_id_seq'::regclass);


--
-- Name: limited_sales id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.limited_sales ALTER COLUMN id SET DEFAULT nextval('public.limited_sales_id_seq'::regclass);


--
-- Name: messages id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.messages ALTER COLUMN id SET DEFAULT nextval('public.messages_id_seq'::regclass);


--
-- Name: owned_achievements id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.owned_achievements ALTER COLUMN id SET DEFAULT nextval('public.owned_achievements_id_seq'::regclass);


--
-- Name: owned_items id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.owned_items ALTER COLUMN id SET DEFAULT nextval('public.owned_items_id_seq'::regclass);


--
-- Name: owneditems id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.owneditems ALTER COLUMN id SET DEFAULT nextval('public.owneditems_id_seq'::regclass);


--
-- Name: pageviews id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pageviews ALTER COLUMN id SET DEFAULT nextval('public.pageviews_id_seq'::regclass);


--
-- Name: reports id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reports ALTER COLUMN id SET DEFAULT nextval('public.reports_id_seq'::regclass);


--
-- Name: topics id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.topics ALTER COLUMN id SET DEFAULT nextval('public.topics_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: wearing id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.wearing ALTER COLUMN id SET DEFAULT nextval('public.wearing_id_seq'::regclass);


--
-- Data for Name: achievements; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.achievements (id, name, description, image) FROM stdin;
\.


--
-- Data for Name: assets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.assets (id, name, type, filename, creator, sales) FROM stdin;
\.


--
-- Data for Name: avatar_cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.avatar_cache (id, userid, cache, last_updated) FROM stdin;
\.


--
-- Data for Name: catalog; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.catalog (id, name, description, type, price, tix, robux, currency, buywith, creatorid, thumbnail, sales, is_limited, total_stock, onsale_until, datecreated, filename, is_forsale) FROM stdin;
\.


--
-- Data for Name: comments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.comments (id, userid, assetid, content, time_posted) FROM stdin;
\.


--
-- Data for Name: forum; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.forum (id, title, content, author, category, reply_to, time_posted, is_pinned) FROM stdin;
\.


--
-- Data for Name: forumgroups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.forumgroups (id, name, description, category) FROM stdin;
\.


--
-- Data for Name: friends; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.friends (id, user_from, user_to, arefriends, hash) FROM stdin;
\.


--
-- Data for Name: games; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.games (id, name, description, thumbnail, creator_id, ip, port, players, defaultmapfilename) FROM stdin;
\.


--
-- Data for Name: gamesvisits; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.gamesvisits (id, gameid, visitorid) FROM stdin;
\.


--
-- Data for Name: global; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.global (id, sitename, maintenance, shutdown_message, "SiteAlert1", "SiteAlert1Color", "ShowingSiteAlert1", "SiteAlert2", "SiteAlert2Color", "ShowingSiteAlert2", "SiteAlert3", "SiteAlert3Color", "ShowingSiteAlert3", "SiteAlert4", "SiteAlert4Color", "ShowingSiteAlert4", "SiteAlert5", "SiteAlert5Color", "ShowingSiteAlert5", "maintenanceEnabled") FROM stdin;
1	GoodBlox	0			#ffffff	no		#ffffff	no		#ffffff	no		#ffffff	no		#ffffff	no	no
\.


--
-- Data for Name: limited_sales; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.limited_sales (id, item_id, price, buyer_id, seller_id, time_sold) FROM stdin;
\.


--
-- Data for Name: messages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.messages (id, user_from, user_to, subject, body, time_sent, readto) FROM stdin;
\.


--
-- Data for Name: owned_achievements; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.owned_achievements (id, user_id, achievement_id) FROM stdin;
\.


--
-- Data for Name: owned_items; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.owned_items (id, itemid, ownerid, type) FROM stdin;
\.


--
-- Data for Name: owneditems; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.owneditems (id, userid, assetid, type) FROM stdin;
\.


--
-- Data for Name: pageviews; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pageviews (id, userid, ip) FROM stdin;
\.


--
-- Data for Name: reports; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.reports (id, userid, reason, reported_user, time_reported) FROM stdin;
\.


--
-- Data for Name: topics; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.topics (id, name, description, category) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, username, email, password, referral, robux, tix, thumbnail, blurb, bc, bcexpire, membership_type, next_tix_reward, next_bricks_award, lastseen, time_joined, ip, bantype, banreason, bandate, unbantime, is_banned, accountcode, avatar_hash, headcolor, torsocolor, leftarmcolor, rightarmcolor, leftlegcolor, rightlegcolor, user_permissions) FROM stdin;
\.


--
-- Data for Name: wearing; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.wearing (id, userid, itemid, type) FROM stdin;
\.


--
-- Name: achievements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.achievements_id_seq', 1, false);


--
-- Name: assets_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.assets_id_seq', 1, false);


--
-- Name: avatar_cache_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.avatar_cache_id_seq', 1, false);


--
-- Name: catalog_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.catalog_id_seq', 1, false);


--
-- Name: comments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.comments_id_seq', 1, false);


--
-- Name: forum_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.forum_id_seq', 1, false);


--
-- Name: forumgroups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.forumgroups_id_seq', 1, false);


--
-- Name: friends_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.friends_id_seq', 1, false);


--
-- Name: games_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.games_id_seq', 1, false);


--
-- Name: gamesvisits_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.gamesvisits_id_seq', 1, false);


--
-- Name: global_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.global_id_seq', 1, false);


--
-- Name: limited_sales_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.limited_sales_id_seq', 1, false);


--
-- Name: messages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.messages_id_seq', 1, false);


--
-- Name: owned_achievements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.owned_achievements_id_seq', 1, false);


--
-- Name: owned_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.owned_items_id_seq', 1, false);


--
-- Name: owneditems_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.owneditems_id_seq', 1, false);


--
-- Name: pageviews_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pageviews_id_seq', 1, false);


--
-- Name: reports_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.reports_id_seq', 1, false);


--
-- Name: topics_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.topics_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- Name: wearing_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.wearing_id_seq', 1, false);


--
-- Name: achievements achievements_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.achievements
    ADD CONSTRAINT achievements_pkey PRIMARY KEY (id);


--
-- Name: assets assets_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.assets
    ADD CONSTRAINT assets_pkey PRIMARY KEY (id);


--
-- Name: avatar_cache avatar_cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.avatar_cache
    ADD CONSTRAINT avatar_cache_pkey PRIMARY KEY (id);


--
-- Name: catalog catalog_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalog
    ADD CONSTRAINT catalog_pkey PRIMARY KEY (id);


--
-- Name: comments comments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (id);


--
-- Name: forum forum_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.forum
    ADD CONSTRAINT forum_pkey PRIMARY KEY (id);


--
-- Name: forumgroups forumgroups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.forumgroups
    ADD CONSTRAINT forumgroups_pkey PRIMARY KEY (id);


--
-- Name: friends friends_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.friends
    ADD CONSTRAINT friends_pkey PRIMARY KEY (id);


--
-- Name: games games_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.games
    ADD CONSTRAINT games_pkey PRIMARY KEY (id);


--
-- Name: gamesvisits gamesvisits_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.gamesvisits
    ADD CONSTRAINT gamesvisits_pkey PRIMARY KEY (id);


--
-- Name: global global_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.global
    ADD CONSTRAINT global_pkey PRIMARY KEY (id);


--
-- Name: limited_sales limited_sales_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.limited_sales
    ADD CONSTRAINT limited_sales_pkey PRIMARY KEY (id);


--
-- Name: messages messages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (id);


--
-- Name: owned_achievements owned_achievements_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.owned_achievements
    ADD CONSTRAINT owned_achievements_pkey PRIMARY KEY (id);


--
-- Name: owned_items owned_items_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.owned_items
    ADD CONSTRAINT owned_items_pkey PRIMARY KEY (id);


--
-- Name: owneditems owneditems_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.owneditems
    ADD CONSTRAINT owneditems_pkey PRIMARY KEY (id);


--
-- Name: pageviews pageviews_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pageviews
    ADD CONSTRAINT pageviews_pkey PRIMARY KEY (id);


--
-- Name: reports reports_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reports
    ADD CONSTRAINT reports_pkey PRIMARY KEY (id);


--
-- Name: topics topics_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.topics
    ADD CONSTRAINT topics_pkey PRIMARY KEY (id);


--
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- Name: wearing wearing_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.wearing
    ADD CONSTRAINT wearing_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

\unrestrict Iz96bU3kEdv7uspO3nQXR6NKz9SCPrlxG10fVLNaYaiLP6T0J3lpRLWxsSZ1yes

