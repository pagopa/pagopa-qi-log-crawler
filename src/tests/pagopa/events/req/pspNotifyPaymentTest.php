<?php

namespace pagopa\events\req;

use pagopa\crawler\events\req\pspNotifyPayment;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

#[TestDox('events\resp\pspNotifyPayment::class')]
class pspNotifyPaymentTest extends TestCase
{

    protected pspNotifyPayment $pspNotifyPayment_credit_cart;

    protected pspNotifyPayment $pspNotifyPayment_paypal;

    protected pspNotifyPayment $pspNotifyPayment_bancomat;

    protected pspNotifyPayment $pspNotifyPayment_additionalPayment;

    protected function setUp(): void
    {
        $this->pspNotifyPayment_credit_cart = new pspNotifyPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'pspNotifyPayment',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'event_no_data',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjM1LjAwPC9kZWJ0QW1vdW50PgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjIwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlXzFfMTwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMjwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTUuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTxtZXRhZGF0YT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8xPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfMl8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJPC90cmFuc2Zlckxpc3Q+CgkJCTxjcmVkaXRDYXJkUGF5bWVudD4KCQkJCTxycm4+MTExMTExMTExMTExPC9ycm4+CgkJCQk8b3V0Y29tZVBheW1lbnRHYXRld2F5Pk9LPC9vdXRjb21lUGF5bWVudEdhdGV3YXk+CgkJCQk8dG90YWxBbW91bnQ+MzYuMzA8L3RvdGFsQW1vdW50PgoJCQkJPGZlZT4xLjMwPC9mZWU+CgkJCQk8dGltZXN0YW1wT3BlcmF0aW9uPjIwMjQtMDQtMTBUMjE6MTQ6NDc8L3RpbWVzdGFtcE9wZXJhdGlvbj4KCQkJCTxhdXRob3JpemF0aW9uQ29kZT4xMTExMTE8L2F1dGhvcml6YXRpb25Db2RlPgoJCQk8L2NyZWRpdENhcmRQYXltZW50PgoJCTwvcGZuOnBzcE5vdGlmeVBheW1lbnRSZXE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );

        $this->pspNotifyPayment_paypal = new pspNotifyPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'pspNotifyPayment',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'event_no_data',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjM1LjAwPC9kZWJ0QW1vdW50PgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjM1LjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8cGF5cGFsUGF5bWVudD4KCQkJCTx0cmFuc2FjdGlvbklkPjExMTExMTExMTwvdHJhbnNhY3Rpb25JZD4KCQkJCTxwc3BUcmFuc2FjdGlvbklkPjExMTExMTExMTExMTExPC9wc3BUcmFuc2FjdGlvbklkPgoJCQkJPHRvdGFsQW1vdW50PjM2LjMwPC90b3RhbEFtb3VudD4KCQkJCTxmZWU+MS4zMDwvZmVlPgoJCQkJPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEwVDIxOjE1OjAxPC90aW1lc3RhbXBPcGVyYXRpb24+CgkJCTwvcGF5cGFsUGF5bWVudD4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]
        );

        $this->pspNotifyPayment_bancomat = new pspNotifyPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'pspNotifyPayment',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'event_no_data',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjM1LjAwPC9kZWJ0QW1vdW50PgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjM1LjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8YmFuY29tYXRwYXlQYXltZW50PgoJCQkJPHRyYW5zYWN0aW9uSWQ+MTExMTExMTExPC90cmFuc2FjdGlvbklkPgoJCQkJPG91dGNvbWVQYXltZW50R2F0ZXdheT4wPC9vdXRjb21lUGF5bWVudEdhdGV3YXk+CgkJCQk8dG90YWxBbW91bnQ+MzYuMzA8L3RvdGFsQW1vdW50PgoJCQkJPGZlZT4xLjMwPC9mZWU+CgkJCQk8dGltZXN0YW1wT3BlcmF0aW9uPjIwMjQtMDQtMTBUMjE6MTM6NDI8L3RpbWVzdGFtcE9wZXJhdGlvbj4KCQkJCTxhdXRob3JpemF0aW9uQ29kZT4xMTExMTExMTExMTExMTExMTExMTExMTwvYXV0aG9yaXphdGlvbkNvZGU+CgkJCTwvYmFuY29tYXRwYXlQYXltZW50PgoJCTwvcGZuOnBzcE5vdGlmeVBheW1lbnRSZXE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );

        $this->pspNotifyPayment_additionalPayment = new pspNotifyPayment(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'pspNotifyPayment',
                'sottotipoevento' => 'REQ',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'event_no_data',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 'c0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 'c0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjM1LjAwPC9kZWJ0QW1vdW50PgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjM1LjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8YWRkaXRpb25hbFBheW1lbnRJbmZvcm1hdGlvbnM+CgkJCQk8bWV0YWRhdGE+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PnRpcG9WZXJzYW1lbnRvPC9rZXk+CgkJCQkJCTx2YWx1ZT5DUDwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+b3V0Y29tZVBheW1lbnRHYXRld2F5PC9rZXk+CgkJCQkJCTx2YWx1ZT5PSzwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+dGltZXN0YW1wT3BlcmF0aW9uPC9rZXk+CgkJCQkJCTx2YWx1ZT4yMDI0LTA0LTEzVDIwOjUyOjEzPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJCTxtYXBFbnRyeT4KCQkJCQkJPGtleT50b3RhbEFtb3VudDwva2V5PgoJCQkJCQk8dmFsdWU+MzYuMzA8L3ZhbHVlPgoJCQkJCTwvbWFwRW50cnk+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PmZlZTwva2V5PgoJCQkJCQk8dmFsdWU+MS4zMDwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+YXV0aG9yaXphdGlvbkNvZGU8L2tleT4KCQkJCQkJPHZhbHVlPjExMTExMTwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+cnJuPC9rZXk+CgkJCQkJCTx2YWx1ZT4xMTExMTExMTExMTExPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJPC9tZXRhZGF0YT4KCQkJPC9hZGRpdGlvbmFsUGF5bWVudEluZm9ybWF0aW9ucz4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]
        );
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->transaction());
        $this->assertNull($this->pspNotifyPayment_bancomat->transaction());
        $this->assertNull($this->pspNotifyPayment_paypal->transaction());
        $this->assertNull($this->pspNotifyPayment_additionalPayment->transaction());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->pspNotifyPayment_credit_cart->getIuvs());
        $this->assertEquals(['01000000000000010'], $this->pspNotifyPayment_bancomat->getIuvs());
        $this->assertEquals(['01000000000000010'], $this->pspNotifyPayment_paypal->getIuvs());
        $this->assertEquals(['01000000000000010'], $this->pspNotifyPayment_additionalPayment->getIuvs());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->pspNotifyPayment_credit_cart->workflowEvent(0);

        $this->assertEquals(15, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('event_no_data', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));


        $workflow = $this->pspNotifyPayment_bancomat->workflowEvent(0);

        $this->assertEquals(15, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('event_no_data', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));


        $workflow = $this->pspNotifyPayment_paypal->workflowEvent(0);

        $this->assertEquals(15, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('event_no_data', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));


        $workflow = $this->pspNotifyPayment_additionalPayment->workflowEvent(0);

        $this->assertEquals(15, $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('event_no_data', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));
        $this->assertNull($workflow->getReadyColumnValue('outcome'));

    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->pspNotifyPayment_credit_cart->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->pspNotifyPayment_bancomat->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->pspNotifyPayment_paypal->getPaEmittenti());
        $this->assertEquals(['77777777777'], $this->pspNotifyPayment_additionalPayment->getPaEmittenti());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(2, $this->pspNotifyPayment_credit_cart->getTransferCount());
        $this->assertEquals(1, $this->pspNotifyPayment_bancomat->getTransferCount());
        $this->assertEquals(1, $this->pspNotifyPayment_paypal->getTransferCount());
        $this->assertEquals(1, $this->pspNotifyPayment_additionalPayment->getTransferCount());

    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->getFaultString());
        $this->assertNull($this->pspNotifyPayment_bancomat->getFaultString());
        $this->assertNull($this->pspNotifyPayment_paypal->getFaultString());
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getFaultString());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspNotifyPayment::class, $this->pspNotifyPayment_credit_cart->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspNotifyPayment::class, $this->pspNotifyPayment_bancomat->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspNotifyPayment::class, $this->pspNotifyPayment_paypal->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\req\pspNotifyPayment::class, $this->pspNotifyPayment_additionalPayment->getMethodInterface());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->getFaultDescription());
        $this->assertNull($this->pspNotifyPayment_bancomat->getFaultDescription());
        $this->assertNull($this->pspNotifyPayment_paypal->getFaultDescription());
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getFaultDescription());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_credit_cart->getCcps());
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_bancomat->getCcps());
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_paypal->getCcps());
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_additionalPayment->getCcps());
    }

    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->getFaultCode());
        $this->assertNull($this->pspNotifyPayment_bancomat->getFaultCode());
        $this->assertNull($this->pspNotifyPayment_paypal->getFaultCode());
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getFaultCode());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->pspNotifyPayment_credit_cart->isFaultEvent());
        $this->assertFalse($this->pspNotifyPayment_bancomat->isFaultEvent());
        $this->assertFalse($this->pspNotifyPayment_paypal->isFaultEvent());
        $this->assertFalse($this->pspNotifyPayment_additionalPayment->isFaultEvent());
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->transactionDetails(0));
        $this->assertNull($this->pspNotifyPayment_bancomat->transactionDetails(0));
        $this->assertNull($this->pspNotifyPayment_paypal->transactionDetails(0));
        $this->assertNull($this->pspNotifyPayment_additionalPayment->transactionDetails(0));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->pspNotifyPayment_credit_cart->getPaymentsCount());
        $this->assertEquals(1, $this->pspNotifyPayment_bancomat->getPaymentsCount());
        $this->assertEquals(1, $this->pspNotifyPayment_paypal->getPaymentsCount());
        $this->assertEquals(1, $this->pspNotifyPayment_additionalPayment->getPaymentsCount());

    }
}
