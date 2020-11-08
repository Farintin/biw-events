--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

-- Started on 2020-10-04 21:10:46 WAT

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

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 2986 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 202 (class 1259 OID 16389)
-- Name: event; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.event (
    id integer NOT NULL,
    name text NOT NULL,
    email text NOT NULL,
    phone text NOT NULL,
    message text NOT NULL
);


ALTER TABLE public.event OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16395)
-- Name: event_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.event ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.event_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 204 (class 1259 OID 16397)
-- Name: masterclass; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.masterclass (
    id integer NOT NULL,
    name text NOT NULL,
    email text NOT NULL,
    address text NOT NULL,
    phone text NOT NULL
);


ALTER TABLE public.masterclass OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16403)
-- Name: masterclass_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.masterclass ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.masterclass_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 206 (class 1259 OID 16405)
-- Name: newsletter; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.newsletter (
    id integer NOT NULL,
    email text NOT NULL
);


ALTER TABLE public.newsletter OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16411)
-- Name: newsletter_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.newsletter ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.newsletter_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- TOC entry 2975 (class 0 OID 16389)
-- Dependencies: 202
-- Data for Name: event; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.event (id, name, email, phone, message) FROM stdin;
\.


--
-- TOC entry 2977 (class 0 OID 16397)
-- Dependencies: 204
-- Data for Name: masterclass; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.masterclass (id, name, email, address, phone) FROM stdin;
\.


--
-- TOC entry 2979 (class 0 OID 16405)
-- Dependencies: 206
-- Data for Name: newsletter; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.newsletter (id, email) FROM stdin;
\.


--
-- TOC entry 2987 (class 0 OID 0)
-- Dependencies: 203
-- Name: event_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.event_id_seq', 3, true);


--
-- TOC entry 2988 (class 0 OID 0)
-- Dependencies: 205
-- Name: masterclass_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.masterclass_id_seq', 3, true);


--
-- TOC entry 2989 (class 0 OID 0)
-- Dependencies: 207
-- Name: newsletter_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.newsletter_id_seq', 44, true);


--
-- TOC entry 2844 (class 2606 OID 16414)
-- Name: event event_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.event
    ADD CONSTRAINT event_pkey PRIMARY KEY (id);


--
-- TOC entry 2846 (class 2606 OID 16416)
-- Name: masterclass masterclass_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.masterclass
    ADD CONSTRAINT masterclass_pkey PRIMARY KEY (id);


--
-- TOC entry 2848 (class 2606 OID 16418)
-- Name: newsletter newsletter_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newsletter
    ADD CONSTRAINT newsletter_pkey PRIMARY KEY (id);


-- Completed on 2020-10-04 21:10:47 WAT

--
-- PostgreSQL database dump complete
--

