<?php

namespace pagopa\events\resp;

use pagopa\crawler\events\resp\activatePaymentNoticeV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('events\resp\activatePaymentNoticeV2::class')]
class activatePaymentNoticeV2Test extends TestCase
{
    protected activatePaymentNoticeV2 $instance_metadata_transfer;

    protected activatePaymentNoticeV2 $instance_metadata_transfer_payment;

    protected activatePaymentNoticeV2 $instance_metadata_bollo;

    protected activatePaymentNoticeV2 $fault_instance;

    protected function setUp(): void
    {
        $this->instance_metadata_transfer = new activatePaymentNoticeV2(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNoticeV2',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_v2',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activate_v2_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4zNjAuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTYwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc4PC9maXNjYWxDb2RlUEE+CgkJCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQkJCTxJQkFOPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8dHJhbnNmZXJDYXRlZ29yeT54eHh4eHg8L3RyYW5zZmVyQ2F0ZWdvcnk+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'
            ]
        );

        $this->instance_metadata_transfer_payment = new activatePaymentNoticeV2(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNoticeV2',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_v2',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activate_v2_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4zNjAuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+bWtfdHJhbnNmZXJfMV8xPC9rZXk+CgkJCQkJCQk8dmFsdWU+bXZfdHJhbnNmZXJfMV8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5ta190cmFuc2Zlcl8xXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT5tdl90cmFuc2Zlcl8xXzI8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCTwvbWV0YWRhdGE+CgkJCQk8L3RyYW5zZmVyPgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjI8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE2MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3ODwvZmlzY2FsQ29kZVBBPgoJCQkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJCQk8SUJBTj5JVDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPHRyYW5zZmVyQ2F0ZWdvcnk+eHh4eHh4PC90cmFuc2ZlckNhdGVnb3J5PgoJCQkJCTxtZXRhZGF0YT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5ta190cmFuc2Zlcl8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT5tdl90cmFuc2Zlcl8yXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5Pm1rX3RyYW5zZmVyXzJfMjwva2V5PgoJCQkJCQkJPHZhbHVlPm12X3RyYW5zZmVyXzJfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8bWV0YWRhdGE+CgkJCQk8bWFwRW50cnk+CgkJCQkJPGtleT5ta19wYXltZW50XzE8L2tleT4KCQkJCQk8dmFsdWU+bXZfcGF5bWVudF8xPC92YWx1ZT4KCQkJCTwvbWFwRW50cnk+CgkJCQk8bWFwRW50cnk+CgkJCQkJPGtleT5ta19wYXltZW50XzI8L2tleT4KCQkJCQk8dmFsdWU+bXZfcGF5bWVudF8yPC92YWx1ZT4KCQkJCTwvbWFwRW50cnk+CgkJCTwvbWV0YWRhdGE+CgkJCTxjcmVkaXRvclJlZmVyZW5jZUlkPjAxMDAwMDAwMDAwMDAwMDEwPC9jcmVkaXRvclJlZmVyZW5jZUlkPgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVYyUmVzcG9uc2U+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );

        $this->instance_metadata_bollo = new activatePaymentNoticeV2(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNoticeV2',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_v2',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activate_v2_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4yMTYuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTYuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPHJpY2hpZXN0YU1hcmNhRGFCb2xsbz4KCQkJCQkJPGhhc2hEb2N1bWVudG8+eHh4eHg8L2hhc2hEb2N1bWVudG8+CgkJCQkJCTx0aXBvQm9sbG8+eHh4eHg8L3RpcG9Cb2xsbz4KCQkJCQkJPHByb3ZpbmNpYVJlc2lkZW56YT54eHh4eHg8L3Byb3ZpbmNpYVJlc2lkZW56YT4KCQkJCQk8L3JpY2hpZXN0YU1hcmNhRGFCb2xsbz4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8dHJhbnNmZXJDYXRlZ29yeT54eHh4eHg8L3RyYW5zZmVyQ2F0ZWdvcnk+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'
            ]
        );

        $this->fault_instance = new activatePaymentNoticeV2(
            [
                'date_event' => '2023-09-01',
                'inserted_timestamp' => '2023-09-01 07:37:50',
                'tipoevento' => 'activatePaymentNoticeV2',
                'sottotipoevento' => 'RESP',
                'psp' => 'AGID_01',
                'stazione' => '77777777777_01',
                'canale' => '88888888888_01',
                'sessionid' => 'sessid_v2',
                'sessionidoriginal' => '',
                'uniqueid' => 'unique_id_activate_v2_OK',
                'state' => 'TO_LOAD',
                'iddominio' => '77777777777',
                'iuv' => '01000000000000010',
                'ccp' => 't0000000000000000000000000000010',
                'noticeNumber' => '301000000000000010',
                'creditorreferenceid' => '01000000000000010',
                'paymenttoken' => 't0000000000000000000000000000010',
                'payload' => 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+S088L291dGNvbWU+CgkJCTxmYXVsdD4KCQkJCTxmYXVsdENvZGU+UFBUX1NUQVpJT05FX0lOVF9QQV9TRVJWSVpJT19OT05BVFRJVk88L2ZhdWx0Q29kZT4KCQkJCTxmYXVsdFN0cmluZz5JbCBTZXJ2aXppbyBBcHBsaWNhdGl2byBkZWxsYSBTdGF6aW9uZSBub24gZScgYXR0aXZvLjwvZmF1bHRTdHJpbmc+CgkJCQk8aWQ+Tm9kb0RlaVBhZ2FtZW50aVNQQzwvaWQ+CgkJCQk8ZGVzY3JpcHRpb24+RXJyb3JlIG5lbCBwcm9jZXNzYW1lbnRvIGRlbCBtZXNzYWdnaW88L2Rlc2NyaXB0aW9uPgoJCQk8L2ZhdWx0PgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVYyUmVzcG9uc2U+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='
            ]
        );
    }

    #[TestDox('transactionDetails()')]
    public function testTransactionDetails()
    {
        $details = $this->instance_metadata_transfer->transactionDetails(0);
        $this->assertEquals('77777777777', $details->getReadyColumnValue('pa_transfer'));
        $this->assertEquals('1', $details->getReadyColumnValue('id_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getReadyColumnValue('iban_transfer'));
        $this->assertEquals('200.00', $details->getReadyColumnValue('amount_transfer'));
        $this->assertNull($details->getReadyColumnValue('iur'));
        $this->assertFalse($details->getReadyColumnValue('is_bollo'));

        $details = $this->instance_metadata_transfer->transactionDetails(1);
        $this->assertEquals('77777777778', $details->getReadyColumnValue('pa_transfer'));
        $this->assertEquals('2', $details->getReadyColumnValue('id_transfer'));
        $this->assertEquals('IT0000000000000000000000002', $details->getReadyColumnValue('iban_transfer'));
        $this->assertEquals('160.00', $details->getReadyColumnValue('amount_transfer'));
        $this->assertNull($details->getReadyColumnValue('iur'));
        $this->assertFalse($details->getReadyColumnValue('is_bollo'));



        $details = $this->instance_metadata_transfer_payment->transactionDetails(0);
        $this->assertEquals('77777777777', $details->getReadyColumnValue('pa_transfer'));
        $this->assertEquals('1', $details->getReadyColumnValue('id_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getReadyColumnValue('iban_transfer'));
        $this->assertEquals('200.00', $details->getReadyColumnValue('amount_transfer'));
        $this->assertNull($details->getReadyColumnValue('iur'));
        $this->assertFalse($details->getReadyColumnValue('is_bollo'));

        $details = $this->instance_metadata_transfer_payment->transactionDetails(1);
        $this->assertEquals('77777777778', $details->getReadyColumnValue('pa_transfer'));
        $this->assertEquals('2', $details->getReadyColumnValue('id_transfer'));
        $this->assertEquals('IT0000000000000000000000002', $details->getReadyColumnValue('iban_transfer'));
        $this->assertEquals('160.00', $details->getReadyColumnValue('amount_transfer'));
        $this->assertNull($details->getReadyColumnValue('iur'));
        $this->assertFalse($details->getReadyColumnValue('is_bollo'));


        $details = $this->instance_metadata_bollo->transactionDetails(0);
        $this->assertEquals('77777777777', $details->getReadyColumnValue('pa_transfer'));
        $this->assertEquals('1', $details->getReadyColumnValue('id_transfer'));
        $this->assertEquals('IT0000000000000000000000001', $details->getReadyColumnValue('iban_transfer'));
        $this->assertEquals('200.00', $details->getReadyColumnValue('amount_transfer'));
        $this->assertNull($details->getReadyColumnValue('iur'));
        $this->assertFalse($details->getReadyColumnValue('is_bollo'));

        $details = $this->instance_metadata_bollo->transactionDetails(1);
        $this->assertEquals('77777777778', $details->getReadyColumnValue('pa_transfer'));
        $this->assertEquals('2', $details->getReadyColumnValue('id_transfer'));
        $this->assertEquals('16.00', $details->getReadyColumnValue('amount_transfer'));
        $this->assertNull($details->getReadyColumnValue('iban_transfer'));
        $this->assertNull($details->getReadyColumnValue('iur'));
        $this->assertTrue($details->getReadyColumnValue('is_bollo'));


        $details = $this->fault_instance->transactionDetails(0);
        $this->assertNull($details);
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(2, $this->instance_metadata_transfer->getTransferCount());
        $this->assertEquals(2, $this->instance_metadata_transfer_payment->getTransferCount());
        $this->assertEquals(2, $this->instance_metadata_bollo->getTransferCount());
        $this->assertNull($this->fault_instance->getTransferCount());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_metadata_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_metadata_transfer_payment->getPaymentsCount());
        $this->assertEquals(1, $this->instance_metadata_bollo->getPaymentsCount());
        $this->assertEquals(1, $this->fault_instance->getPaymentsCount());
    }


    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->instance_metadata_transfer->getIuvs());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getIuvs());
        $this->assertEquals($value, $this->instance_metadata_bollo->getIuvs());
        $this->assertEquals($value, $this->fault_instance->getIuvs());
    }

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->instance_metadata_transfer->getCcps());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getCcps());
        $this->assertEquals($value, $this->instance_metadata_bollo->getCcps());
        $this->assertEquals($value, $this->fault_instance->getCcps());
    }


    #[TestDox('getFaultCode()')]
    public function testGetFaultCode()
    {
        $this->assertNull($this->instance_metadata_transfer->getFaultCode());
        $this->assertNull($this->instance_metadata_transfer_payment->getFaultCode());
        $this->assertNull($this->instance_metadata_bollo->getFaultCode());
        $this->assertEquals('PPT_STAZIONE_INT_PA_SERVIZIO_NONATTIVO', $this->fault_instance->getFaultCode());
    }

    #[TestDox('getFaultString()')]
    public function testGetFaultString()
    {
        $this->assertNull($this->instance_metadata_transfer->getFaultString());
        $this->assertNull($this->instance_metadata_transfer_payment->getFaultString());
        $this->assertNull($this->instance_metadata_bollo->getFaultString());
        $this->assertEquals('Il Servizio Applicativo della Stazione non e\' attivo.', $this->fault_instance->getFaultString());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->instance_metadata_transfer->getPaEmittenti());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getPaEmittenti());
        $this->assertEquals($value, $this->instance_metadata_bollo->getPaEmittenti());
        $this->assertEquals($value, $this->fault_instance->getPaEmittenti());
    }

    #[TestDox('getMethodInterface()')]
    public function testGetMethodInterface()
    {
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNoticeV2::class, $this->instance_metadata_transfer->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNoticeV2::class, $this->instance_metadata_transfer_payment->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNoticeV2::class, $this->instance_metadata_bollo->getMethodInterface());
        $this->assertInstanceOf(\pagopa\crawler\methods\resp\activatePaymentNoticeV2::class, $this->fault_instance->getMethodInterface());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->instance_metadata_transfer->isFaultEvent());
        $this->assertFalse($this->instance_metadata_transfer_payment->isFaultEvent());
        $this->assertFalse($this->instance_metadata_bollo->isFaultEvent());
        $this->assertTrue($this->fault_instance->isFaultEvent());

    }

    #[TestDox('transaction()')]
    public function testTransaction()
    {
        $this->assertNull($this->instance_metadata_transfer->transaction());
        $this->assertNull($this->instance_metadata_transfer_payment->transaction());
        $this->assertNull($this->instance_metadata_bollo->transaction());
        $this->assertNull($this->fault_instance->transaction());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->instance_metadata_transfer->getFaultDescription());
        $this->assertNull($this->instance_metadata_transfer_payment->getFaultDescription());
        $this->assertNull($this->instance_metadata_bollo->getFaultDescription());
        $this->assertEquals('Errore nel processamento del messaggio', $this->fault_instance->getFaultDescription());
    }

    #[TestDox('workflowEvent()')]
    public function testWorkflowEvent()
    {
        $workflow = $this->instance_metadata_transfer->workflowEvent(0);
        $this->assertEquals('24', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activate_v2_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

        $workflow = $this->instance_metadata_transfer_payment->workflowEvent(0);
        $this->assertEquals('24', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activate_v2_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));

        $workflow = $this->instance_metadata_bollo->workflowEvent(0);
        $this->assertEquals('24', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activate_v2_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('OK', $workflow->getReadyColumnValue('outcome'));
        $this->assertNull($workflow->getReadyColumnValue('faultcode'));


        $workflow = $this->fault_instance->workflowEvent(0);
        $this->assertEquals('24', $workflow->getReadyColumnValue('fk_tipoevento'));
        $this->assertEquals('2023-09-01 07:37:50.000', $workflow->getReadyColumnValue('event_timestamp'));
        $this->assertEquals('unique_id_activate_v2_OK', $workflow->getReadyColumnValue('event_id'));
        $this->assertEquals('AGID_01', $workflow->getReadyColumnValue('id_psp'));
        $this->assertEquals('77777777777_01', $workflow->getReadyColumnValue('stazione'));
        $this->assertEquals('88888888888_01', $workflow->getReadyColumnValue('canale'));
        $this->assertEquals('KO', $workflow->getReadyColumnValue('outcome'));
        $this->assertEquals('PPT_STAZIONE_INT_PA_SERVIZIO_NONATTIVO', $workflow->getReadyColumnValue('faultcode'));
    }
}
