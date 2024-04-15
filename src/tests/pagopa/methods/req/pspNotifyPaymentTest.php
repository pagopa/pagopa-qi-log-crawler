<?php

namespace pagopa\methods\req;

use pagopa\crawler\methods\req\pspNotifyPayment;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class pspNotifyPaymentTest extends TestCase
{

    protected pspNotifyPayment $pspNotifyPayment_credit_cart;

    protected pspNotifyPayment $pspNotifyPayment_paypal;

    protected pspNotifyPayment $pspNotifyPayment_bancomat;

    protected pspNotifyPayment $pspNotifyPayment_additionalPayment;


    protected function setUp(): void
    {
        $this->pspNotifyPayment_credit_cart = new pspNotifyPayment(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjM1LjAwPC9kZWJ0QW1vdW50PgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjIwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMTwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlXzFfMTwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+Y2hpYXZlXzFfMjwva2V5PgoJCQkJCQkJPHZhbHVlPnZhbHVlXzFfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTUuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8SUJBTj5JVDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTxtZXRhZGF0YT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8xPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfMl8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5jaGlhdmVfMl8yPC9rZXk+CgkJCQkJCQk8dmFsdWU+dmFsdWVfMl8yPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8L21ldGFkYXRhPgoJCQkJPC90cmFuc2Zlcj4KCQkJPC90cmFuc2Zlckxpc3Q+CgkJCTxjcmVkaXRDYXJkUGF5bWVudD4KCQkJCTxycm4+MTExMTExMTExMTExPC9ycm4+CgkJCQk8b3V0Y29tZVBheW1lbnRHYXRld2F5Pk9LPC9vdXRjb21lUGF5bWVudEdhdGV3YXk+CgkJCQk8dG90YWxBbW91bnQ+MzYuMzA8L3RvdGFsQW1vdW50PgoJCQkJPGZlZT4xLjMwPC9mZWU+CgkJCQk8dGltZXN0YW1wT3BlcmF0aW9uPjIwMjQtMDQtMTBUMjE6MTQ6NDc8L3RpbWVzdGFtcE9wZXJhdGlvbj4KCQkJCTxhdXRob3JpemF0aW9uQ29kZT4xMTExMTE8L2F1dGhvcml6YXRpb25Db2RlPgoJCQk8L2NyZWRpdENhcmRQYXltZW50PgoJCTwvcGZuOnBzcE5vdGlmeVBheW1lbnRSZXE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
        $this->pspNotifyPayment_paypal = new pspNotifyPayment(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjM1LjAwPC9kZWJ0QW1vdW50PgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjM1LjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8cGF5cGFsUGF5bWVudD4KCQkJCTx0cmFuc2FjdGlvbklkPjExMTExMTExMTwvdHJhbnNhY3Rpb25JZD4KCQkJCTxwc3BUcmFuc2FjdGlvbklkPjExMTExMTExMTExMTExPC9wc3BUcmFuc2FjdGlvbklkPgoJCQkJPHRvdGFsQW1vdW50PjM2LjMwPC90b3RhbEFtb3VudD4KCQkJCTxmZWU+MS4zMDwvZmVlPgoJCQkJPHRpbWVzdGFtcE9wZXJhdGlvbj4yMDI0LTA0LTEwVDIxOjE1OjAxPC90aW1lc3RhbXBPcGVyYXRpb24+CgkJCTwvcGF5cGFsUGF5bWVudD4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
        $this->pspNotifyPayment_bancomat = new pspNotifyPayment(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjM1LjAwPC9kZWJ0QW1vdW50PgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjM1LjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8YmFuY29tYXRwYXlQYXltZW50PgoJCQkJPHRyYW5zYWN0aW9uSWQ+MTExMTExMTExPC90cmFuc2FjdGlvbklkPgoJCQkJPG91dGNvbWVQYXltZW50R2F0ZXdheT4wPC9vdXRjb21lUGF5bWVudEdhdGV3YXk+CgkJCQk8dG90YWxBbW91bnQ+MzYuMzA8L3RvdGFsQW1vdW50PgoJCQkJPGZlZT4xLjMwPC9mZWU+CgkJCQk8dGltZXN0YW1wT3BlcmF0aW9uPjIwMjQtMDQtMTBUMjE6MTM6NDI8L3RpbWVzdGFtcE9wZXJhdGlvbj4KCQkJCTxhdXRob3JpemF0aW9uQ29kZT4xMTExMTExMTExMTExMTExMTExMTExMTwvYXV0aG9yaXphdGlvbkNvZGU+CgkJCTwvYmFuY29tYXRwYXlQYXltZW50PgoJCTwvcGZuOnBzcE5vdGlmeVBheW1lbnRSZXE+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
        $this->pspNotifyPayment_additionalPayment = new pspNotifyPayment(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpwZm49Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvcHNwL3BzcEZvck5vZGUueHNkIiB4bWxuczpzb2FwZW52PSJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy9zb2FwL2VudmVsb3BlLyIgeG1sbnM6eHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hIiB4bWxuczp4c2k9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvWE1MU2NoZW1hLWluc3RhbmNlIj4KCTxzb2FwZW52OkJvZHk+CgkJPHBmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJCQk8aWRQU1A+QUdJRF8wMTwvaWRQU1A+CgkJCTxpZEJyb2tlclBTUD44ODg4ODg4ODg4ODwvaWRCcm9rZXJQU1A+CgkJCTxpZENoYW5uZWw+ODg4ODg4ODg4ODhfMDE8L2lkQ2hhbm5lbD4KCQkJPHBheW1lbnRUb2tlbj5jMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudFRva2VuPgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPnBhZ2FtZW50byBtdWx0aWJlbmVmaWNpYXJpbzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJCTxkZWJ0QW1vdW50PjM1LjAwPC9kZWJ0QW1vdW50PgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjM1LjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8YWRkaXRpb25hbFBheW1lbnRJbmZvcm1hdGlvbnM+CgkJCQk8bWV0YWRhdGE+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PnRpcG9WZXJzYW1lbnRvPC9rZXk+CgkJCQkJCTx2YWx1ZT5DUDwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+b3V0Y29tZVBheW1lbnRHYXRld2F5PC9rZXk+CgkJCQkJCTx2YWx1ZT5PSzwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+dGltZXN0YW1wT3BlcmF0aW9uPC9rZXk+CgkJCQkJCTx2YWx1ZT4yMDI0LTA0LTEzVDIwOjUyOjEzPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJCTxtYXBFbnRyeT4KCQkJCQkJPGtleT50b3RhbEFtb3VudDwva2V5PgoJCQkJCQk8dmFsdWU+MzYuMzA8L3ZhbHVlPgoJCQkJCTwvbWFwRW50cnk+CgkJCQkJPG1hcEVudHJ5PgoJCQkJCQk8a2V5PmZlZTwva2V5PgoJCQkJCQk8dmFsdWU+MS4zMDwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+YXV0aG9yaXphdGlvbkNvZGU8L2tleT4KCQkJCQkJPHZhbHVlPjExMTExMTwvdmFsdWU+CgkJCQkJPC9tYXBFbnRyeT4KCQkJCQk8bWFwRW50cnk+CgkJCQkJCTxrZXk+cnJuPC9rZXk+CgkJCQkJCTx2YWx1ZT4xMTExMTExMTExMTExPC92YWx1ZT4KCQkJCQk8L21hcEVudHJ5PgoJCQkJPC9tZXRhZGF0YT4KCQkJPC9hZGRpdGlvbmFsUGF5bWVudEluZm9ybWF0aW9ucz4KCQk8L3Bmbjpwc3BOb3RpZnlQYXltZW50UmVxPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='));
    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->pspNotifyPayment_credit_cart->getTransferPa(0, 0));
        $this->assertEquals('77777777778', $this->pspNotifyPayment_credit_cart->getTransferPa(1, 0));
        $this->assertNull($this->pspNotifyPayment_credit_cart->getTransferPa(2, 0));

        $this->assertEquals('77777777777', $this->pspNotifyPayment_paypal->getTransferPa(0, 0));
        $this->assertNull($this->pspNotifyPayment_paypal->getTransferPa(1, 0));

        $this->assertEquals('77777777777', $this->pspNotifyPayment_bancomat->getTransferPa(0, 0));
        $this->assertNull($this->pspNotifyPayment_bancomat->getTransferPa(1, 0));

        $this->assertEquals('77777777777', $this->pspNotifyPayment_additionalPayment->getTransferPa(0, 0));
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getTransferPa(1, 0));


    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->pspNotifyPayment_paypal->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->pspNotifyPayment_bancomat->getPaymentMetaDataKey(0, 0));

        $this->assertEquals('tipoVersamento', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataKey(0, 0));
        $this->assertEquals('outcomePaymentGateway', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataKey(0, 1));
        $this->assertEquals('timestampOperation', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataKey(0, 2));
        $this->assertEquals('totalAmount', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataKey(0, 3));
        $this->assertEquals('fee', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataKey(0, 4));
        $this->assertEquals('authorizationCode', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataKey(0, 5));
        $this->assertEquals('rrn', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataKey(0, 6));

    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertEquals(1, $this->pspNotifyPayment_credit_cart->getTransferId(0));
        $this->assertEquals(2, $this->pspNotifyPayment_credit_cart->getTransferId(1));
        $this->assertNull($this->pspNotifyPayment_credit_cart->getTransferId(2));

        $this->assertEquals(1, $this->pspNotifyPayment_paypal->getTransferId(0));
        $this->assertNull($this->pspNotifyPayment_paypal->getTransferId(1));

        $this->assertEquals(1, $this->pspNotifyPayment_bancomat->getTransferId(0));
        $this->assertNull($this->pspNotifyPayment_bancomat->getTransferId(1));

        $this->assertEquals(1, $this->pspNotifyPayment_additionalPayment->getTransferId(0));
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getTransferId(1));

    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('77777777777', $this->pspNotifyPayment_credit_cart->getPaEmittente());
        $this->assertEquals('77777777777', $this->pspNotifyPayment_paypal->getPaEmittente());
        $this->assertEquals('77777777777', $this->pspNotifyPayment_bancomat->getPaEmittente());
        $this->assertEquals('77777777777', $this->pspNotifyPayment_additionalPayment->getPaEmittente());
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('20.00', $this->pspNotifyPayment_credit_cart->getTransferAmount(0));
        $this->assertEquals('15.00', $this->pspNotifyPayment_credit_cart->getTransferAmount(1));
        $this->assertNull($this->pspNotifyPayment_credit_cart->getTransferAmount(2));

        $this->assertEquals('35.00', $this->pspNotifyPayment_paypal->getTransferAmount(0));
        $this->assertNull($this->pspNotifyPayment_paypal->getTransferAmount(1));

        $this->assertEquals('35.00', $this->pspNotifyPayment_bancomat->getTransferAmount(0));
        $this->assertNull($this->pspNotifyPayment_bancomat->getTransferAmount(1));

        $this->assertEquals('35.00', $this->pspNotifyPayment_additionalPayment->getTransferAmount(0));
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getTransferAmount(1));

    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('AGID_01', $this->pspNotifyPayment_credit_cart->getPsp());
        $this->assertEquals('AGID_01', $this->pspNotifyPayment_paypal->getPsp());
        $this->assertEquals('AGID_01', $this->pspNotifyPayment_bancomat->getPsp());
        $this->assertEquals('AGID_01', $this->pspNotifyPayment_additionalPayment->getPsp());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('88888888888_01', $this->pspNotifyPayment_credit_cart->getCanale());
        $this->assertEquals('88888888888_01', $this->pspNotifyPayment_paypal->getCanale());
        $this->assertEquals('88888888888_01', $this->pspNotifyPayment_bancomat->getCanale());
        $this->assertEquals('88888888888_01', $this->pspNotifyPayment_additionalPayment->getCanale());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->getNoticeNumber());
        $this->assertNull($this->pspNotifyPayment_paypal->getNoticeNumber());
        $this->assertNull($this->pspNotifyPayment_bancomat->getNoticeNumber());
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getNoticeNumber());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(2, $this->pspNotifyPayment_credit_cart->getTransferCount(0));
        $this->assertEquals(1, $this->pspNotifyPayment_paypal->getTransferCount(0));
        $this->assertEquals(1, $this->pspNotifyPayment_bancomat->getTransferCount(0));
        $this->assertEquals(1, $this->pspNotifyPayment_additionalPayment->getTransferCount(0));
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getTransferMetaDataValue(0, 0, 1));

        $this->assertNull($this->pspNotifyPayment_paypal->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->pspNotifyPayment_paypal->getTransferMetaDataValue(0, 0, 1));

        $this->assertNull($this->pspNotifyPayment_bancomat->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->pspNotifyPayment_bancomat->getTransferMetaDataValue(0, 0, 1));

        $this->assertEquals('value_1_1', $this->pspNotifyPayment_credit_cart->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('value_1_2', $this->pspNotifyPayment_credit_cart->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->pspNotifyPayment_credit_cart->getTransferMetaDataValue(0, 0, 2));

        $this->assertEquals('value_2_1', $this->pspNotifyPayment_credit_cart->getTransferMetaDataValue(1, 0, 0));
        $this->assertEquals('value_2_2', $this->pspNotifyPayment_credit_cart->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->pspNotifyPayment_credit_cart->getTransferMetaDataValue(1, 0, 2));

    }

    #[TestDox('getRRN()')]
    public function testGetRRN()
    {
        $this->assertEquals('111111111111', $this->pspNotifyPayment_credit_cart->getRRN(0));
        $this->assertNull($this->pspNotifyPayment_paypal->getRRN());
        $this->assertNull($this->pspNotifyPayment_bancomat->getRRN());
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getRRN());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->getAllNoticesNumbers());
        $this->assertNull($this->pspNotifyPayment_paypal->getAllNoticesNumbers());
        $this->assertNull($this->pspNotifyPayment_bancomat->getAllNoticesNumbers());
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getAllNoticesNumbers());
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('35.00', $this->pspNotifyPayment_credit_cart->getImporto(0));
        $this->assertEquals('35.00', $this->pspNotifyPayment_paypal->getImporto(0));
        $this->assertEquals('35.00', $this->pspNotifyPayment_bancomat->getImporto(0));
        $this->assertEquals('35.00', $this->pspNotifyPayment_additionalPayment->getImporto(0));
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('35.00', $this->pspNotifyPayment_credit_cart->getImportoTotale(0));
        $this->assertEquals('35.00', $this->pspNotifyPayment_paypal->getImportoTotale(0));
        $this->assertEquals('35.00', $this->pspNotifyPayment_bancomat->getImportoTotale(0));
        $this->assertEquals('35.00', $this->pspNotifyPayment_additionalPayment->getImportoTotale(0));
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('88888888888', $this->pspNotifyPayment_credit_cart->getBrokerPsp(0));
        $this->assertEquals('88888888888', $this->pspNotifyPayment_paypal->getBrokerPsp(0));
        $this->assertEquals('88888888888', $this->pspNotifyPayment_bancomat->getBrokerPsp(0));
        $this->assertEquals('88888888888', $this->pspNotifyPayment_additionalPayment->getBrokerPsp(0));
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('01000000000000010', $this->pspNotifyPayment_credit_cart->getIuv(0));
        $this->assertEquals('01000000000000010', $this->pspNotifyPayment_paypal->getIuv(0));
        $this->assertEquals('01000000000000010', $this->pspNotifyPayment_bancomat->getIuv(0));
        $this->assertEquals('01000000000000010', $this->pspNotifyPayment_additionalPayment->getIuv(0));
    }

    #[TestDox('getTransactionId()')]
    public function testGetTransactionId()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->getTransactionId(0));
        $this->assertEquals('111111111', $this->pspNotifyPayment_paypal->getTransactionId(0));
        $this->assertEquals('111111111', $this->pspNotifyPayment_bancomat->getTransactionId(0));
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getTransactionId(0));
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->getBrokerPa());
        $this->assertNull($this->pspNotifyPayment_paypal->getBrokerPa());
        $this->assertNull($this->pspNotifyPayment_bancomat->getBrokerPa());
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getBrokerPa());
    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['01000000000000010'], $this->pspNotifyPayment_credit_cart->getIuvs(0));
        $this->assertEquals(['01000000000000010'], $this->pspNotifyPayment_paypal->getIuvs(0));
        $this->assertEquals(['01000000000000010'], $this->pspNotifyPayment_bancomat->getIuvs(0));
        $this->assertEquals(['01000000000000010'], $this->pspNotifyPayment_additionalPayment->getIuvs(0));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->pspNotifyPayment_credit_cart->getTransferIban(0));
        $this->assertEquals('IT0000000000000000000000002', $this->pspNotifyPayment_credit_cart->getTransferIban(1));
        $this->assertNull($this->pspNotifyPayment_credit_cart->getTransferIban(2));

        $this->assertEquals('IT0000000000000000000000001', $this->pspNotifyPayment_paypal->getTransferIban(0));
        $this->assertNull($this->pspNotifyPayment_paypal->getTransferIban(1));

        $this->assertEquals('IT0000000000000000000000001', $this->pspNotifyPayment_bancomat->getTransferIban(0));
        $this->assertNull($this->pspNotifyPayment_bancomat->getTransferIban(1));

        $this->assertEquals('IT0000000000000000000000001', $this->pspNotifyPayment_additionalPayment->getTransferIban(0));
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getTransferIban(1));
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->pspNotifyPayment_paypal->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->pspNotifyPayment_bancomat->getPaymentMetaDataValue(0, 0));

        $this->assertEquals('CP', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('OK', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataValue(0, 1));
        $this->assertEquals('2024-04-13T20:52:13', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataValue(0, 2));
        $this->assertEquals('36.30', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataValue(0, 3));
        $this->assertEquals('1.30', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataValue(0, 4));
        $this->assertEquals('111111', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataValue(0, 5));
        $this->assertEquals('1111111111111', $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataValue(0, 6));
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['77777777777'], $this->pspNotifyPayment_credit_cart->getPaEmittenti(0));
        $this->assertEquals(['77777777777'], $this->pspNotifyPayment_paypal->getPaEmittenti(0));
        $this->assertEquals(['77777777777'], $this->pspNotifyPayment_bancomat->getPaEmittenti(0));
        $this->assertEquals(['77777777777'], $this->pspNotifyPayment_additionalPayment->getPaEmittenti(0));
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertEquals(0, $this->pspNotifyPayment_credit_cart->getPaymentMetaDataCount(0));
        $this->assertEquals(0, $this->pspNotifyPayment_paypal->getPaymentMetaDataCount(0));
        $this->assertEquals(0, $this->pspNotifyPayment_bancomat->getPaymentMetaDataCount(0));
        $this->assertEquals(7, $this->pspNotifyPayment_additionalPayment->getPaymentMetaDataCount(0));

    }

    #[TestDox('getAuthCode()')]
    public function testGetAuthCode()
    {
        $this->assertEquals('111111', $this->pspNotifyPayment_credit_cart->getAuthCode(0));
        $this->assertNull($this->pspNotifyPayment_paypal->getAuthCode(0));
        $this->assertEquals('11111111111111111111111', $this->pspNotifyPayment_bancomat->getAuthCode(0));
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getAuthCode(0));
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->pspNotifyPayment_credit_cart->getPaymentsCount(0));
        $this->assertEquals(1, $this->pspNotifyPayment_paypal->getPaymentsCount(0));
        $this->assertEquals(1, $this->pspNotifyPayment_bancomat->getPaymentsCount(0));
        $this->assertEquals(1, $this->pspNotifyPayment_additionalPayment->getPaymentsCount(0));
    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->pspNotifyPayment_credit_cart->isBollo(0));
        $this->assertFalse($this->pspNotifyPayment_paypal->isBollo(0));
        $this->assertFalse($this->pspNotifyPayment_bancomat->isBollo(0));
        $this->assertFalse($this->pspNotifyPayment_additionalPayment->isBollo(0));
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_credit_cart->getAllTokens(0));
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_paypal->getAllTokens(0));
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_bancomat->getAllTokens(0));
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_additionalPayment->getAllTokens(0));
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $this->assertEquals('c0000000000000000000000000000010', $this->pspNotifyPayment_credit_cart->getToken(0));
        $this->assertEquals('c0000000000000000000000000000010', $this->pspNotifyPayment_paypal->getToken(0));
        $this->assertEquals('c0000000000000000000000000000010', $this->pspNotifyPayment_bancomat->getToken(0));
        $this->assertEquals('c0000000000000000000000000000010', $this->pspNotifyPayment_additionalPayment->getToken(0));
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertEquals(2, $this->pspNotifyPayment_credit_cart->getTransferMetaDataCount(0, 0));
        $this->assertEquals(2, $this->pspNotifyPayment_credit_cart->getTransferMetaDataCount(0, 0));

        $this->assertEquals(0, $this->pspNotifyPayment_paypal->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->pspNotifyPayment_bancomat->getTransferMetaDataCount(0, 0));
        $this->assertEquals(0, $this->pspNotifyPayment_additionalPayment->getTransferMetaDataCount(0, 0));
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->outcome());
        $this->assertNull($this->pspNotifyPayment_paypal->outcome());
        $this->assertNull($this->pspNotifyPayment_bancomat->outcome());
        $this->assertNull($this->pspNotifyPayment_additionalPayment->outcome());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->pspNotifyPayment_credit_cart->getStazione());
        $this->assertNull($this->pspNotifyPayment_paypal->getStazione());
        $this->assertNull($this->pspNotifyPayment_bancomat->getStazione());
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getStazione());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->pspNotifyPayment_additionalPayment->getTransferMetaDataKey(0, 0, 1));

        $this->assertNull($this->pspNotifyPayment_paypal->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->pspNotifyPayment_paypal->getTransferMetaDataKey(0, 0, 1));

        $this->assertNull($this->pspNotifyPayment_bancomat->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->pspNotifyPayment_bancomat->getTransferMetaDataKey(0, 0, 1));

        $this->assertEquals('chiave_1_1', $this->pspNotifyPayment_credit_cart->getTransferMetaDataKey(0, 0, 0));
        $this->assertEquals('chiave_1_2', $this->pspNotifyPayment_credit_cart->getTransferMetaDataKey(0, 0, 1));
        $this->assertNull($this->pspNotifyPayment_credit_cart->getTransferMetaDataKey(0, 0, 2));

        $this->assertEquals('chiave_2_1', $this->pspNotifyPayment_credit_cart->getTransferMetaDataKey(1, 0, 0));
        $this->assertEquals('chiave_2_2', $this->pspNotifyPayment_credit_cart->getTransferMetaDataKey(1, 0, 1));
        $this->assertNull($this->pspNotifyPayment_credit_cart->getTransferMetaDataKey(1, 0, 2));
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_credit_cart->getCcps(0));
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_paypal->getCcps(0));
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_bancomat->getCcps(0));
        $this->assertEquals(['c0000000000000000000000000000010'], $this->pspNotifyPayment_additionalPayment->getCcps(0));
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('c0000000000000000000000000000010', $this->pspNotifyPayment_credit_cart->getCcp(0));
        $this->assertEquals('c0000000000000000000000000000010', $this->pspNotifyPayment_paypal->getCcp(0));
        $this->assertEquals('c0000000000000000000000000000010', $this->pspNotifyPayment_bancomat->getCcp(0));
        $this->assertEquals('c0000000000000000000000000000010', $this->pspNotifyPayment_additionalPayment->getCcp(0));
    }
}
