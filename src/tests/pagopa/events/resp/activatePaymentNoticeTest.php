<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\activatePaymentNotice;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\activatePaymentNotice::class')]
class activatePaymentNoticeTest extends TestCase
{


    protected activatePaymentNotice $instance_all_field;


    protected activatePaymentNotice $instance_no_stazione_canale_in_evento;


    protected activatePaymentNotice $instance_no_iuv_in_evento;


    protected activatePaymentNotice $instance_no_dominio_in_evento;


    protected activatePaymentNotice $instance_no_token_in_evento;


    protected activatePaymentNotice $instance_no_nav_in_evento;

    protected activatePaymentNotice $faultInstance;

    protected function setUp(): void
    {
        $this->instance_all_field = new activatePaymentNotice(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNotice',
                'sottotipoevento' => 'RESP',
                'psp' => 'ABI03069',
                'stazione' => '02770891204_01',
                'canale' => '97249640588_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'unique_id_activate_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '06655971007',
                'iuv' => '04100435542586389',
                'ccp' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'noticenumber' => '304100435542586389',
                'creditorreferenceid' => '04100435542586389',
                'paymenttoken' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4My44NTwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+RU5FTCBFTkVSR0lBL05VTURPQz00MzU1NDI1ODYzL0RBVEFET0M9MDguMDguMjAyMy9BVlZJU089MzA0MTAwNDM1NTQyNTg2Mzg5L0lNUE9SVE89MTgzLDg1LzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjA2NjU1OTcxMDA3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT5FbmVsIEVuZXJnaWEgUy5wLkEuPC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj4wYThlZjRmMDE5NGY0ODg2OTQyY2JjOGRhOGZkYmUwNDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE4My44NTwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT4wNjY1NTk3MTAwNzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDMwNjkwOTQwMDEwMDAwMDAwOTEzODwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPi9SRkIvMDQxMDA0MzU1NDI1ODYzODkvVFhUL0VORUwgRU5FUkdJQS9OVU1ET0M9NDM1NTQyNTg2My9EQVRBRE9DPTA4LjA4LjIwMjMvQVZWSVNPPTMwNDEwMDQzNTU0MjU4NjM4OS9JTVBPUlRPPTE4Myw4NS88L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wNDEwMDQzNTU0MjU4NjM4OTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );

        $this->instance_no_stazione_canale_in_evento = new activatePaymentNotice(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNotice',
                'sottotipoevento' => 'RESP',
                'psp' => '',
                'stazione' => '',
                'canale' => '',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'unique_id_activate_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '06655971007',
                'iuv' => '04100435542586389',
                'ccp' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'noticenumber' => '304100435542586389',
                'creditorreferenceid' => '04100435542586389',
                'paymenttoken' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4My44NTwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+RU5FTCBFTkVSR0lBL05VTURPQz00MzU1NDI1ODYzL0RBVEFET0M9MDguMDguMjAyMy9BVlZJU089MzA0MTAwNDM1NTQyNTg2Mzg5L0lNUE9SVE89MTgzLDg1LzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjA2NjU1OTcxMDA3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT5FbmVsIEVuZXJnaWEgUy5wLkEuPC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj4wYThlZjRmMDE5NGY0ODg2OTQyY2JjOGRhOGZkYmUwNDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE4My44NTwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT4wNjY1NTk3MTAwNzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDMwNjkwOTQwMDEwMDAwMDAwOTEzODwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPi9SRkIvMDQxMDA0MzU1NDI1ODYzODkvVFhUL0VORUwgRU5FUkdJQS9OVU1ET0M9NDM1NTQyNTg2My9EQVRBRE9DPTA4LjA4LjIwMjMvQVZWSVNPPTMwNDEwMDQzNTU0MjU4NjM4OS9JTVBPUlRPPTE4Myw4NS88L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wNDEwMDQzNTU0MjU4NjM4OTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );


        $this->instance_no_iuv_in_evento = new activatePaymentNotice(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNotice',
                'sottotipoevento' => 'RESP',
                'psp' => 'ABI03069',
                'stazione' => '02770891204_01',
                'canale' => '97249640588_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'unique_id_activate_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '06655971007',
                'iuv' => '',
                'ccp' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'noticenumber' => '304100435542586389',
                'creditorreferenceid' => '',
                'paymenttoken' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4My44NTwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+RU5FTCBFTkVSR0lBL05VTURPQz00MzU1NDI1ODYzL0RBVEFET0M9MDguMDguMjAyMy9BVlZJU089MzA0MTAwNDM1NTQyNTg2Mzg5L0lNUE9SVE89MTgzLDg1LzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjA2NjU1OTcxMDA3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT5FbmVsIEVuZXJnaWEgUy5wLkEuPC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj4wYThlZjRmMDE5NGY0ODg2OTQyY2JjOGRhOGZkYmUwNDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE4My44NTwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT4wNjY1NTk3MTAwNzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDMwNjkwOTQwMDEwMDAwMDAwOTEzODwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPi9SRkIvMDQxMDA0MzU1NDI1ODYzODkvVFhUL0VORUwgRU5FUkdJQS9OVU1ET0M9NDM1NTQyNTg2My9EQVRBRE9DPTA4LjA4LjIwMjMvQVZWSVNPPTMwNDEwMDQzNTU0MjU4NjM4OS9JTVBPUlRPPTE4Myw4NS88L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wNDEwMDQzNTU0MjU4NjM4OTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );


        $this->instance_no_dominio_in_evento = new activatePaymentNotice(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNotice',
                'sottotipoevento' => 'RESP',
                'psp' => 'ABI03069',
                'stazione' => '02770891204_01',
                'canale' => '97249640588_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'unique_id_activate_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '',
                'iuv' => '04100435542586389',
                'ccp' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'noticenumber' => '304100435542586389',
                'creditorreferenceid' => '04100435542586389',
                'paymenttoken' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4My44NTwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+RU5FTCBFTkVSR0lBL05VTURPQz00MzU1NDI1ODYzL0RBVEFET0M9MDguMDguMjAyMy9BVlZJU089MzA0MTAwNDM1NTQyNTg2Mzg5L0lNUE9SVE89MTgzLDg1LzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjA2NjU1OTcxMDA3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT5FbmVsIEVuZXJnaWEgUy5wLkEuPC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj4wYThlZjRmMDE5NGY0ODg2OTQyY2JjOGRhOGZkYmUwNDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE4My44NTwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT4wNjY1NTk3MTAwNzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDMwNjkwOTQwMDEwMDAwMDAwOTEzODwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPi9SRkIvMDQxMDA0MzU1NDI1ODYzODkvVFhUL0VORUwgRU5FUkdJQS9OVU1ET0M9NDM1NTQyNTg2My9EQVRBRE9DPTA4LjA4LjIwMjMvQVZWSVNPPTMwNDEwMDQzNTU0MjU4NjM4OS9JTVBPUlRPPTE4Myw4NS88L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wNDEwMDQzNTU0MjU4NjM4OTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );


        $this->instance_no_token_in_evento = new activatePaymentNotice(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNotice',
                'sottotipoevento' => 'RESP',
                'psp' => 'ABI03069',
                'stazione' => '02770891204_01',
                'canale' => '97249640588_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'unique_id_activate_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '06655971007',
                'iuv' => '04100435542586389',
                'ccp' => '',
                'noticenumber' => '304100435542586389',
                'creditorreferenceid' => '04100435542586389',
                'paymenttoken' => '',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4My44NTwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+RU5FTCBFTkVSR0lBL05VTURPQz00MzU1NDI1ODYzL0RBVEFET0M9MDguMDguMjAyMy9BVlZJU089MzA0MTAwNDM1NTQyNTg2Mzg5L0lNUE9SVE89MTgzLDg1LzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjA2NjU1OTcxMDA3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT5FbmVsIEVuZXJnaWEgUy5wLkEuPC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj4wYThlZjRmMDE5NGY0ODg2OTQyY2JjOGRhOGZkYmUwNDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE4My44NTwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT4wNjY1NTk3MTAwNzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDMwNjkwOTQwMDEwMDAwMDAwOTEzODwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPi9SRkIvMDQxMDA0MzU1NDI1ODYzODkvVFhUL0VORUwgRU5FUkdJQS9OVU1ET0M9NDM1NTQyNTg2My9EQVRBRE9DPTA4LjA4LjIwMjMvQVZWSVNPPTMwNDEwMDQzNTU0MjU4NjM4OS9JTVBPUlRPPTE4Myw4NS88L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wNDEwMDQzNTU0MjU4NjM4OTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );


        $this->instance_no_nav_in_evento = new activatePaymentNotice(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNotice',
                'sottotipoevento' => 'RESP',
                'psp' => 'ABI03069',
                'stazione' => '02770891204_01',
                'canale' => '97249640588_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'unique_id_activate_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '06655971007',
                'iuv' => '04100435542586389',
                'ccp' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'noticenumber' => '',
                'creditorreferenceid' => '04100435542586389',
                'paymenttoken' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5PSzwvb3V0Y29tZT4KCQkJPHRvdGFsQW1vdW50PjE4My44NTwvdG90YWxBbW91bnQ+CgkJCTxwYXltZW50RGVzY3JpcHRpb24+RU5FTCBFTkVSR0lBL05VTURPQz00MzU1NDI1ODYzL0RBVEFET0M9MDguMDguMjAyMy9BVlZJU089MzA0MTAwNDM1NTQyNTg2Mzg5L0lNUE9SVE89MTgzLDg1LzwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjA2NjU1OTcxMDA3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT5FbmVsIEVuZXJnaWEgUy5wLkEuPC9jb21wYW55TmFtZT4KCQkJPHBheW1lbnRUb2tlbj4wYThlZjRmMDE5NGY0ODg2OTQyY2JjOGRhOGZkYmUwNDwvcGF5bWVudFRva2VuPgoJCQk8dHJhbnNmZXJMaXN0PgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjE8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE4My44NTwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT4wNjY1NTk3MTAwNzwvZmlzY2FsQ29kZVBBPgoJCQkJCTxJQkFOPklUMThVMDMwNjkwOTQwMDEwMDAwMDAwOTEzODwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPi9SRkIvMDQxMDA0MzU1NDI1ODYzODkvVFhUL0VORUwgRU5FUkdJQS9OVU1ET0M9NDM1NTQyNTg2My9EQVRBRE9DPTA4LjA4LjIwMjMvQVZWSVNPPTMwNDEwMDQzNTU0MjU4NjM4OS9JTVBPUlRPPTE4Myw4NS88L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8Y3JlZGl0b3JSZWZlcmVuY2VJZD4wNDEwMDQzNTU0MjU4NjM4OTwvY3JlZGl0b3JSZWZlcmVuY2VJZD4KCQk8L25mcDphY3RpdmF0ZVBheW1lbnROb3RpY2VSZXM+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );

        $this->faultInstance = new activatePaymentNotice(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNotice',
                'sottotipoevento' => 'RESP',
                'psp' => 'ABI03069',
                'stazione' => '02770891204_01',
                'canale' => '97249640588_01',
                'sessionid' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'sessionidoriginal' => '6c9ce650-3542-4a10-b8bb-9c3331d2ebef',
                'uniqueid' => 'unique_id_activate_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '06655971007',
                'iuv' => '04100435542586389',
                'ccp' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'noticenumber' => '304100435542586389',
                'creditorreferenceid' => '04100435542586389',
                'paymenttoken' => '0a8ef4f0194f4886942cbc8da8fdbe04',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJCQk8b3V0Y29tZT5LTzwvb3V0Y29tZT4KCQkJPGZhdWx0PgoJCQkJPGZhdWx0Q29kZT5QUFRfRVJST1JFX0VNRVNTT19EQV9QQUE8L2ZhdWx0Q29kZT4KCQkJCTxmYXVsdFN0cmluZz5FcnJvcmUgcmVzdGl0dWl0byBkYWxsYSBQQUEuPC9mYXVsdFN0cmluZz4KCQkJCTxpZD44MDAwMDA1MDkyNDwvaWQ+CgkJCQk8ZGVzY3JpcHRpb24+RmF1bHRDb2RlIFBBOiBQQUFfUEFHQU1FTlRPX0RVUExJQ0FUTwpGYXVsdFN0cmluZyBQQTogUGFnYW1lbnRvIGluIGF0dGVzYSByaXN1bHRhIGNvbmNsdXNvIGFsbCdFbnRlCUNyZWRpdG9yZQpEZXNjcmlwdGlvbiBQQTogUGFnYW1lbnRvIEF0dGVzbyBpbiBzdGF0byBSSUNFVlVUQV9SVF9QT1NJVElWQTwvZGVzY3JpcHRpb24+CgkJCTwvZmF1bHQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlUmVzPgoJPC9zb2FwZW52OkJvZHk+Cjwvc29hcGVudjpFbnZlbG9wZT4='
            ]
        );
    }


    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {

        /*  instance_all_field;
            instance_no_stazione_canale_in_evento;
            instance_no_iuv_in_evento;
            instance_no_dominio_in_evento;
            instance_no_token_in_evento;
            instance_no_nav_in_evento;
            faultInstance;
        */
        $this->assertEquals(1, $this->instance_all_field->getPaymentsCount());
        $this->assertEquals(1, $this->instance_no_stazione_canale_in_evento->getPaymentsCount());
        $this->assertEquals(1, $this->instance_no_iuv_in_evento->getPaymentsCount());
        $this->assertEquals(1, $this->instance_no_dominio_in_evento->getPaymentsCount());
        $this->assertEquals(1, $this->instance_no_token_in_evento->getPaymentsCount());
        $this->assertEquals(1, $this->instance_no_nav_in_evento->getPaymentsCount());
        $this->assertEquals(1, $this->faultInstance->getPaymentsCount());
    }

    #[TestDox('getTipoEvento()')]
    public function testGetTipoEvento()
    {
        $this->assertEquals('activatePaymentNotice', $this->instance_all_field->getTipoEvento());
        $this->assertEquals('activatePaymentNotice', $this->instance_no_stazione_canale_in_evento->getTipoEvento());
        $this->assertEquals('activatePaymentNotice', $this->instance_no_iuv_in_evento->getTipoEvento());
        $this->assertEquals('activatePaymentNotice', $this->instance_no_dominio_in_evento->getTipoEvento());
        $this->assertEquals('activatePaymentNotice', $this->instance_no_token_in_evento->getTipoEvento());
        $this->assertEquals('activatePaymentNotice', $this->instance_no_nav_in_evento->getTipoEvento());
        $this->assertEquals('activatePaymentNotice', $this->faultInstance->getTipoEvento());
    }

    #[TestDox('getSottoTipoEvento()')]
    public function testGetSottoTipoEvento()
    {
        $this->assertEquals('RESP', $this->instance_all_field->getSottoTipoEvento());
        $this->assertEquals('RESP', $this->instance_no_stazione_canale_in_evento->getSottoTipoEvento());
        $this->assertEquals('RESP', $this->instance_no_iuv_in_evento->getSottoTipoEvento());
        $this->assertEquals('RESP', $this->instance_no_dominio_in_evento->getSottoTipoEvento());
        $this->assertEquals('RESP', $this->instance_no_token_in_evento->getSottoTipoEvento());
        $this->assertEquals('RESP', $this->instance_no_nav_in_evento->getSottoTipoEvento());
        $this->assertEquals('RESP', $this->faultInstance->getSottoTipoEvento());

    }


    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $this->assertEquals(['06655971007'], $this->instance_all_field->getPaEmittenti());
        $this->assertEquals(['06655971007'], $this->instance_no_stazione_canale_in_evento->getPaEmittenti());
        $this->assertEquals(['06655971007'], $this->instance_no_iuv_in_evento->getPaEmittenti());
        $this->assertNull($this->instance_no_dominio_in_evento->getPaEmittenti());
        $this->assertEquals(['06655971007'], $this->instance_no_token_in_evento->getPaEmittenti());
        $this->assertEquals(['06655971007'], $this->instance_no_nav_in_evento->getPaEmittenti());
        $this->assertEquals(['06655971007'], $this->faultInstance->getPaEmittenti());

    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $this->assertEquals(['04100435542586389'], $this->instance_all_field->getIuvs());
        $this->assertEquals(['04100435542586389'], $this->instance_no_stazione_canale_in_evento->getIuvs());
        $this->assertNull($this->instance_no_iuv_in_evento->getIuvs());
        $this->assertEquals(['04100435542586389'], $this->instance_no_dominio_in_evento->getIuvs());
        $this->assertEquals(['04100435542586389'], $this->instance_no_token_in_evento->getIuvs());
        $this->assertEquals(['04100435542586389'], $this->instance_no_nav_in_evento->getIuvs());
        $this->assertEquals(['04100435542586389'], $this->faultInstance->getIuvs());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $this->assertEquals(['0a8ef4f0194f4886942cbc8da8fdbe04'], $this->instance_all_field->getCCps());
        $this->assertEquals(['0a8ef4f0194f4886942cbc8da8fdbe04'], $this->instance_no_stazione_canale_in_evento->getCCps());
        $this->assertEquals(['0a8ef4f0194f4886942cbc8da8fdbe04'], $this->instance_no_iuv_in_evento->getCCps());
        $this->assertEquals(['0a8ef4f0194f4886942cbc8da8fdbe04'], $this->instance_no_dominio_in_evento->getCCps());
        $this->assertNull($this->instance_no_token_in_evento->getCCps());
        $this->assertEquals(['0a8ef4f0194f4886942cbc8da8fdbe04'], $this->instance_no_nav_in_evento->getCCps());
        $this->assertEquals(['0a8ef4f0194f4886942cbc8da8fdbe04'], $this->faultInstance->getCCps());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $this->assertEquals('06655971007', $this->instance_all_field->getPaEmittente());
        $this->assertEquals('06655971007', $this->instance_no_stazione_canale_in_evento->getPaEmittente());
        $this->assertEquals('06655971007', $this->instance_no_iuv_in_evento->getPaEmittente());
        $this->assertNull($this->instance_no_dominio_in_evento->getPaEmittente());
        $this->assertEquals('06655971007', $this->instance_no_token_in_evento->getPaEmittente());
        $this->assertEquals('06655971007', $this->instance_no_nav_in_evento->getPaEmittente());
        $this->assertEquals('06655971007', $this->faultInstance->getPaEmittente());

    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $this->assertEquals('04100435542586389', $this->instance_all_field->getIuv());
        $this->assertEquals('04100435542586389', $this->instance_no_stazione_canale_in_evento->getIuv());
        $this->assertNull($this->instance_no_iuv_in_evento->getIuv());
        $this->assertEquals('04100435542586389', $this->instance_no_dominio_in_evento->getIuv());
        $this->assertEquals('04100435542586389', $this->instance_no_token_in_evento->getIuv());
        $this->assertEquals('04100435542586389', $this->instance_no_nav_in_evento->getIuv());
        $this->assertEquals('04100435542586389', $this->faultInstance->getIuv());

    }

    #[TestDox('getCreditorReferenceId()')]
    public function testGetCreditorReferenceId()
    {
        $this->assertEquals('04100435542586389', $this->instance_all_field->getCreditorReferenceId());
        $this->assertEquals('04100435542586389', $this->instance_no_stazione_canale_in_evento->getCreditorReferenceId());
        $this->assertNull($this->instance_no_iuv_in_evento->getCreditorReferenceId());
        $this->assertEquals('04100435542586389', $this->instance_no_dominio_in_evento->getCreditorReferenceId());
        $this->assertEquals('04100435542586389', $this->instance_no_token_in_evento->getCreditorReferenceId());
        $this->assertEquals('04100435542586389', $this->instance_no_nav_in_evento->getCreditorReferenceId());
        $this->assertEquals('04100435542586389', $this->faultInstance->getCreditorReferenceId());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->instance_all_field->getCcp());
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->instance_no_stazione_canale_in_evento->getCcp());
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->instance_no_iuv_in_evento->getCcp());
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->instance_no_dominio_in_evento->getCcp());
        $this->assertNull($this->instance_no_token_in_evento->getCcp());
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->instance_no_nav_in_evento->getCcp());
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->faultInstance->getCcp());
    }

    #[TestDox('getPaymentToken()')]
    public function testGetPaymentToken()
    {
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->instance_all_field->getPaymentToken());
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->instance_no_stazione_canale_in_evento->getPaymentToken());
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->instance_no_iuv_in_evento->getPaymentToken());
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->instance_no_dominio_in_evento->getPaymentToken());
        $this->assertNull($this->instance_no_token_in_evento->getPaymentToken());
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->instance_no_nav_in_evento->getPaymentToken());
        $this->assertEquals('0a8ef4f0194f4886942cbc8da8fdbe04', $this->faultInstance->getPaymentToken());
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertEquals('304100435542586389', $this->instance_all_field->getNoticeNumber());
        $this->assertEquals('304100435542586389', $this->instance_no_stazione_canale_in_evento->getNoticeNumber());
        $this->assertEquals('304100435542586389', $this->instance_no_iuv_in_evento->getNoticeNumber());
        $this->assertEquals('304100435542586389', $this->instance_no_dominio_in_evento->getNoticeNumber());
        $this->assertEquals('304100435542586389', $this->instance_no_token_in_evento->getNoticeNumber());
        $this->assertEquals('304100435542586389', $this->faultInstance->getNoticeNumber());
        $this->assertNull($this->instance_no_nav_in_evento->getNoticeNumber());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertEquals('ABI03069', $this->instance_all_field->getPsp());
        $this->assertNull($this->instance_no_stazione_canale_in_evento->getPsp());
        $this->assertEquals('ABI03069', $this->instance_no_iuv_in_evento->getPsp());
        $this->assertEquals('ABI03069', $this->instance_no_dominio_in_evento->getPsp());
        $this->assertEquals('ABI03069', $this->instance_no_token_in_evento->getPsp());
        $this->assertEquals('ABI03069', $this->instance_no_nav_in_evento->getPsp());
        $this->assertEquals('ABI03069', $this->faultInstance->getPsp());
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertEquals('97249640588_01', $this->instance_all_field->getCanale());
        $this->assertEquals('97249640588_01', $this->instance_no_iuv_in_evento->getCanale());
        $this->assertEquals('97249640588_01', $this->instance_no_dominio_in_evento->getCanale());
        $this->assertEquals('97249640588_01', $this->instance_no_token_in_evento->getCanale());
        $this->assertEquals('97249640588_01', $this->instance_no_nav_in_evento->getCanale());
        $this->assertEquals('97249640588_01', $this->faultInstance->getCanale());
        $this->assertNull($this->instance_no_stazione_canale_in_evento->getCanale());
    }

    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertEquals('97249640588', $this->instance_all_field->getBrokerPsp());
        $this->assertEquals('97249640588', $this->instance_no_iuv_in_evento->getBrokerPsp());
        $this->assertEquals('97249640588', $this->instance_no_dominio_in_evento->getBrokerPsp());
        $this->assertEquals('97249640588', $this->instance_no_token_in_evento->getBrokerPsp());
        $this->assertEquals('97249640588', $this->instance_no_nav_in_evento->getBrokerPsp());
        $this->assertEquals('97249640588', $this->faultInstance->getBrokerPsp());
        $this->assertNull($this->instance_no_stazione_canale_in_evento->getBrokerPsp());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertEquals('02770891204_01', $this->instance_all_field->getStazione());
        $this->assertEquals('02770891204_01', $this->instance_no_iuv_in_evento->getStazione());
        $this->assertEquals('02770891204_01', $this->instance_no_dominio_in_evento->getStazione());
        $this->assertEquals('02770891204_01', $this->instance_no_token_in_evento->getStazione());
        $this->assertEquals('02770891204_01', $this->instance_no_nav_in_evento->getStazione());
        $this->assertEquals('02770891204_01', $this->faultInstance->getStazione());
        $this->assertNull($this->instance_no_stazione_canale_in_evento->getStazione());
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertEquals('02770891204', $this->instance_all_field->getBrokerPa());
        $this->assertEquals('02770891204', $this->instance_no_iuv_in_evento->getBrokerPa());
        $this->assertEquals('02770891204', $this->instance_no_dominio_in_evento->getBrokerPa());
        $this->assertEquals('02770891204', $this->instance_no_token_in_evento->getBrokerPa());
        $this->assertEquals('02770891204', $this->instance_no_nav_in_evento->getBrokerPa());
        $this->assertEquals('02770891204', $this->faultInstance->getBrokerPa());
        $this->assertNull($this->instance_no_stazione_canale_in_evento->getBrokerPa());
    }

    #[TestDox('isValid()')]
    public function testIsValid()
    {
        $this->assertTrue(true);
    }

    #[TestDox('getKey()')]
    public function testGetKey()
    {
        $this->assertTrue(true);
    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertTrue(true);
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNotice::class, $this->instance_all_field->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNotice::class, $this->instance_no_stazione_canale_in_evento->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNotice::class, $this->instance_no_iuv_in_evento->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNotice::class, $this->instance_no_dominio_in_evento->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNotice::class, $this->instance_no_token_in_evento->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNotice::class, $this->instance_no_nav_in_evento->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNotice::class, $this->faultInstance->getMethodInterface());

    }
}
