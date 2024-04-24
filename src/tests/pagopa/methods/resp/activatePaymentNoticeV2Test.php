<?php

namespace pagopa\methods\resp;

use pagopa\crawler\methods\resp\activatePaymentNoticeV2;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('methods\resp\activatePaymentNoticeV2::class')]
class activatePaymentNoticeV2Test extends TestCase
{

    protected activatePaymentNoticeV2 $instance_metadata_transfer;

    protected activatePaymentNoticeV2 $instance_metadata_transfer_payment;

    protected activatePaymentNoticeV2 $instance_metadata_bollo;

    protected activatePaymentNoticeV2 $fault_instance;

    protected function setUp(): void
    {
        $this->instance_metadata_transfer = new activatePaymentNoticeV2(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4zNjAuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTYwLjAwPC90cmFuc2ZlckFtb3VudD4KCQkJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc4PC9maXNjYWxDb2RlUEE+CgkJCQkJPGNvbXBhbnlOYW1lPnh4eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQkJCTxJQkFOPklUMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMjwvSUJBTj4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8dHJhbnNmZXJDYXRlZ29yeT54eHh4eHg8L3RyYW5zZmVyQ2F0ZWdvcnk+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
        $this->instance_metadata_transfer_payment = new activatePaymentNoticeV2(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4zNjAuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCQk8bWV0YWRhdGE+CgkJCQkJCTxtYXBFbnRyeT4KCQkJCQkJCTxrZXk+bWtfdHJhbnNmZXJfMV8xPC9rZXk+CgkJCQkJCQk8dmFsdWU+bXZfdHJhbnNmZXJfMV8xPC92YWx1ZT4KCQkJCQkJPC9tYXBFbnRyeT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5ta190cmFuc2Zlcl8xXzI8L2tleT4KCQkJCQkJCTx2YWx1ZT5tdl90cmFuc2Zlcl8xXzI8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCTwvbWV0YWRhdGE+CgkJCQk8L3RyYW5zZmVyPgoJCQkJPHRyYW5zZmVyPgoJCQkJCTxpZFRyYW5zZmVyPjI8L2lkVHJhbnNmZXI+CgkJCQkJPHRyYW5zZmVyQW1vdW50PjE2MC4wMDwvdHJhbnNmZXJBbW91bnQ+CgkJCQkJPGZpc2NhbENvZGVQQT43Nzc3Nzc3Nzc3ODwvZmlzY2FsQ29kZVBBPgoJCQkJCTxjb21wYW55TmFtZT54eHh4eHh4PC9jb21wYW55TmFtZT4KCQkJCQk8SUJBTj5JVDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDI8L0lCQU4+CgkJCQkJPHJlbWl0dGFuY2VJbmZvcm1hdGlvbj54eHh4eHh4PC9yZW1pdHRhbmNlSW5mb3JtYXRpb24+CgkJCQkJPHRyYW5zZmVyQ2F0ZWdvcnk+eHh4eHh4PC90cmFuc2ZlckNhdGVnb3J5PgoJCQkJCTxtZXRhZGF0YT4KCQkJCQkJPG1hcEVudHJ5PgoJCQkJCQkJPGtleT5ta190cmFuc2Zlcl8yXzE8L2tleT4KCQkJCQkJCTx2YWx1ZT5tdl90cmFuc2Zlcl8yXzE8L3ZhbHVlPgoJCQkJCQk8L21hcEVudHJ5PgoJCQkJCQk8bWFwRW50cnk+CgkJCQkJCQk8a2V5Pm1rX3RyYW5zZmVyXzJfMjwva2V5PgoJCQkJCQkJPHZhbHVlPm12X3RyYW5zZmVyXzJfMjwvdmFsdWU+CgkJCQkJCTwvbWFwRW50cnk+CgkJCQkJPC9tZXRhZGF0YT4KCQkJCTwvdHJhbnNmZXI+CgkJCTwvdHJhbnNmZXJMaXN0PgoJCQk8bWV0YWRhdGE+CgkJCQk8bWFwRW50cnk+CgkJCQkJPGtleT5ta19wYXltZW50XzE8L2tleT4KCQkJCQk8dmFsdWU+bXZfcGF5bWVudF8xPC92YWx1ZT4KCQkJCTwvbWFwRW50cnk+CgkJCQk8bWFwRW50cnk+CgkJCQkJPGtleT5ta19wYXltZW50XzI8L2tleT4KCQkJCQk8dmFsdWU+bXZfcGF5bWVudF8yPC92YWx1ZT4KCQkJCTwvbWFwRW50cnk+CgkJCTwvbWV0YWRhdGE+CgkJCTxjcmVkaXRvclJlZmVyZW5jZUlkPjAxMDAwMDAwMDAwMDAwMDEwPC9jcmVkaXRvclJlZmVyZW5jZUlkPgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVYyUmVzcG9uc2U+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
        $this->instance_metadata_bollo = new activatePaymentNoticeV2(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+T0s8L291dGNvbWU+CgkJCTx0b3RhbEFtb3VudD4yMTYuMDA8L3RvdGFsQW1vdW50PgoJCQk8cGF5bWVudERlc2NyaXB0aW9uPjMwMTAwMDAwMDAwMDAwMDAxMDwvcGF5bWVudERlc2NyaXB0aW9uPgoJCQk8ZmlzY2FsQ29kZVBBPjc3Nzc3Nzc3Nzc3PC9maXNjYWxDb2RlUEE+CgkJCTxjb21wYW55TmFtZT54eHh4eHg8L2NvbXBhbnlOYW1lPgoJCQk8b2ZmaWNlTmFtZT54eHh4eHg8L29mZmljZU5hbWU+CgkJCTxwYXltZW50VG9rZW4+dDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMTA8L3BheW1lbnRUb2tlbj4KCQkJPHRyYW5zZmVyTGlzdD4KCQkJCTx0cmFuc2Zlcj4KCQkJCQk8aWRUcmFuc2Zlcj4xPC9pZFRyYW5zZmVyPgoJCQkJCTx0cmFuc2ZlckFtb3VudD4yMDAuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzc8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPElCQU4+SVQwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAxPC9JQkFOPgoJCQkJCTxyZW1pdHRhbmNlSW5mb3JtYXRpb24+eHh4eHh4eDwvcmVtaXR0YW5jZUluZm9ybWF0aW9uPgoJCQkJCTx0cmFuc2ZlckNhdGVnb3J5Pnh4eHh4eDwvdHJhbnNmZXJDYXRlZ29yeT4KCQkJCTwvdHJhbnNmZXI+CgkJCQk8dHJhbnNmZXI+CgkJCQkJPGlkVHJhbnNmZXI+MjwvaWRUcmFuc2Zlcj4KCQkJCQk8dHJhbnNmZXJBbW91bnQ+MTYuMDA8L3RyYW5zZmVyQW1vdW50PgoJCQkJCTxmaXNjYWxDb2RlUEE+Nzc3Nzc3Nzc3Nzg8L2Zpc2NhbENvZGVQQT4KCQkJCQk8Y29tcGFueU5hbWU+eHh4eHh4eDwvY29tcGFueU5hbWU+CgkJCQkJPHJpY2hpZXN0YU1hcmNhRGFCb2xsbz4KCQkJCQkJPGhhc2hEb2N1bWVudG8+eHh4eHg8L2hhc2hEb2N1bWVudG8+CgkJCQkJCTx0aXBvQm9sbG8+eHh4eHg8L3RpcG9Cb2xsbz4KCQkJCQkJPHByb3ZpbmNpYVJlc2lkZW56YT54eHh4eHg8L3Byb3ZpbmNpYVJlc2lkZW56YT4KCQkJCQk8L3JpY2hpZXN0YU1hcmNhRGFCb2xsbz4KCQkJCQk8cmVtaXR0YW5jZUluZm9ybWF0aW9uPnh4eHh4eHg8L3JlbWl0dGFuY2VJbmZvcm1hdGlvbj4KCQkJCQk8dHJhbnNmZXJDYXRlZ29yeT54eHh4eHg8L3RyYW5zZmVyQ2F0ZWdvcnk+CgkJCQk8L3RyYW5zZmVyPgoJCQk8L3RyYW5zZmVyTGlzdD4KCQkJPGNyZWRpdG9yUmVmZXJlbmNlSWQ+MDEwMDAwMDAwMDAwMDAwMTA8L2NyZWRpdG9yUmVmZXJlbmNlSWQ+CgkJPC9uZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCTwvc29hcGVudjpCb2R5Pgo8L3NvYXBlbnY6RW52ZWxvcGU+'));
        $this->fault_instance = new activatePaymentNoticeV2(base64_decode('PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIiA/Pgo8c29hcGVudjpFbnZlbG9wZSB4bWxuczpjb21tb249Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQveHNkL2NvbW1vbi10eXBlcy92MS4wLjAvIiB4bWxuczpuZnA9Imh0dHA6Ly9wYWdvcGEtYXBpLnBhZ29wYS5nb3YuaXQvbm9kZS9ub2RlRm9yUHNwLnhzZCIgeG1sbnM6c29hcGVudj0iaHR0cDovL3NjaGVtYXMueG1sc29hcC5vcmcvc29hcC9lbnZlbG9wZS8iIHhtbG5zOnhzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYSIgeG1sbnM6eHNpPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxL1hNTFNjaGVtYS1pbnN0YW5jZSI+Cgk8c29hcGVudjpCb2R5PgoJCTxuZnA6YWN0aXZhdGVQYXltZW50Tm90aWNlVjJSZXNwb25zZT4KCQkJPG91dGNvbWU+S088L291dGNvbWU+CgkJCTxmYXVsdD4KCQkJCTxmYXVsdENvZGU+UFBUX1NUQVpJT05FX0lOVF9QQV9TRVJWSVpJT19OT05BVFRJVk88L2ZhdWx0Q29kZT4KCQkJCTxmYXVsdFN0cmluZz5JbCBTZXJ2aXppbyBBcHBsaWNhdGl2byBkZWxsYSBTdGF6aW9uZSBub24gZScgYXR0aXZvLjwvZmF1bHRTdHJpbmc+CgkJCQk8aWQ+Tm9kb0RlaVBhZ2FtZW50aVNQQzwvaWQ+CgkJCQk8ZGVzY3JpcHRpb24+RXJyb3JlIG5lbCBwcm9jZXNzYW1lbnRvIGRlbCBtZXNzYWdnaW88L2Rlc2NyaXB0aW9uPgoJCQk8L2ZhdWx0PgoJCTwvbmZwOmFjdGl2YXRlUGF5bWVudE5vdGljZVYyUmVzcG9uc2U+Cgk8L3NvYXBlbnY6Qm9keT4KPC9zb2FwZW52OkVudmVsb3BlPg=='));
    }

    #[TestDox('outcome()')]
    public function testOutcome()
    {
        $this->assertEquals('OK', $this->instance_metadata_transfer->outcome());
        $this->assertEquals('OK', $this->instance_metadata_transfer_payment->outcome());
        $this->assertEquals('OK', $this->instance_metadata_bollo->outcome());
        $this->assertEquals('KO', $this->fault_instance->outcome());
    }

    #[TestDox('getCcp()')]
    public function testGetCcp()
    {
        $value = 't0000000000000000000000000000010';
        $this->assertEquals($value, $this->instance_metadata_transfer->getCcp());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getCcp());
        $this->assertEquals($value, $this->instance_metadata_bollo->getCcp());
        $this->assertNull($this->fault_instance->getCcp());
    }

    #[TestDox('getTransferCount()')]
    public function testGetTransferCount()
    {
        $this->assertEquals(2, $this->instance_metadata_transfer->getTransferCount());
        $this->assertEquals(2, $this->instance_metadata_transfer_payment->getTransferCount());
        $this->assertEquals(2, $this->instance_metadata_bollo->getTransferCount());
        $this->assertNull($this->fault_instance->getTransferCount());
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

    #[TestDox('getCcps()')]
    public function testGetCcps()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->instance_metadata_transfer->getCcps());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getCcps());
        $this->assertEquals($value, $this->instance_metadata_bollo->getCcps());
        $this->assertNull($this->fault_instance->getCcps());
    }

    #[TestDox('getPaEmittente()')]
    public function testGetPaEmittente()
    {
        $value = '77777777777';
        $this->assertEquals($value, $this->instance_metadata_transfer->getPaEmittente());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getPaEmittente());
        $this->assertEquals($value, $this->instance_metadata_bollo->getPaEmittente());
        $this->assertNull($this->fault_instance->getPaEmittente());
    }

    #[TestDox('getTransferId()')]
    public function testGetTransferId()
    {
        $this->assertEquals(1, $this->instance_metadata_transfer->getTransferId(0));
        $this->assertEquals(2, $this->instance_metadata_transfer->getTransferId(1));
        $this->assertNull($this->instance_metadata_bollo->getTransferId(2));

        $this->assertEquals(1, $this->instance_metadata_transfer_payment->getTransferId(0));
        $this->assertEquals(2, $this->instance_metadata_transfer_payment->getTransferId(1));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferId(2));

        $this->assertEquals(1, $this->instance_metadata_bollo->getTransferId(0));
        $this->assertEquals(2, $this->instance_metadata_bollo->getTransferId(1));
        $this->assertNull($this->instance_metadata_bollo->getTransferId(2));

        $this->assertNull($this->fault_instance->getTransferId(0));
        $this->assertNull($this->fault_instance->getTransferId(1));
        $this->assertNull($this->fault_instance->getTransferId(2));

    }

    #[TestDox('getIuvs()')]
    public function testGetIuvs()
    {
        $value = ['01000000000000010'];
        $this->assertEquals($value, $this->instance_metadata_transfer->getIuvs());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getIuvs());
        $this->assertEquals($value, $this->instance_metadata_bollo->getIuvs());
        $this->assertNull($this->fault_instance->getIuvs());
    }

    #[TestDox('isFaultEvent()')]
    public function testIsFaultEvent()
    {
        $this->assertFalse($this->instance_metadata_transfer->isFaultEvent());
        $this->assertFalse($this->instance_metadata_transfer_payment->isFaultEvent());
        $this->assertFalse($this->instance_metadata_bollo->isFaultEvent());
        $this->assertTrue($this->fault_instance->isFaultEvent());
    }

    #[TestDox('getAllNoticesNumbers()')]
    public function testGetAllNoticesNumbers()
    {
        $this->assertNull($this->instance_metadata_transfer->getAllNoticesNumbers());
        $this->assertNull($this->instance_metadata_transfer_payment->getAllNoticesNumbers());
        $this->assertNull($this->instance_metadata_bollo->getAllNoticesNumbers());
        $this->assertNull($this->fault_instance->getAllNoticesNumbers());
    }

    #[TestDox('getPaymentMetaDataKey()')]
    public function testGetPaymentMetaDataKey()
    {
        $this->assertNull($this->instance_metadata_transfer->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance_metadata_transfer->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance_metadata_transfer->getPaymentMetaDataKey(1, 0));

        $this->assertNull($this->instance_metadata_bollo->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->instance_metadata_bollo->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance_metadata_bollo->getPaymentMetaDataKey(1, 0));

        $this->assertNull($this->fault_instance->getPaymentMetaDataKey(0, 0));
        $this->assertNull($this->fault_instance->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->fault_instance->getPaymentMetaDataKey(1, 0));

        $this->assertEquals('mk_payment_1', $this->instance_metadata_transfer_payment->getPaymentMetaDataKey(0, 0));
        $this->assertEquals('mk_payment_2', $this->instance_metadata_transfer_payment->getPaymentMetaDataKey(0, 1));
        $this->assertNull($this->instance_metadata_transfer_payment->getPaymentMetaDataKey(1, 0));
        $this->assertNull($this->instance_metadata_transfer_payment->getPaymentMetaDataKey(1, 1));
    }

    #[TestDox('getIuv()')]
    public function testGetIuv()
    {
        $value = '01000000000000010';
        $this->assertEquals($value, $this->instance_metadata_transfer->getIuv());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getIuv());
        $this->assertEquals($value, $this->instance_metadata_bollo->getIuv());
        $this->assertNull($this->fault_instance->getIuv());
    }

    #[TestDox('getTransferMetaDataKey()')]
    public function testGetTransferMetaDataKey()
    {
        $this->assertEquals('mk_transfer_1_1', $this->instance_metadata_transfer_payment->getTransferMetaDataKey(0, 0, 0));
        $this->assertEquals('mk_transfer_1_2', $this->instance_metadata_transfer_payment->getTransferMetaDataKey(0, 0, 1));
        $this->assertEquals('mk_transfer_2_1', $this->instance_metadata_transfer_payment->getTransferMetaDataKey(1, 0, 0));
        $this->assertEquals('mk_transfer_2_2', $this->instance_metadata_transfer_payment->getTransferMetaDataKey(1, 0, 1));

        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataKey(2, 0, 0));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataKey(2, 0, 1));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataKey(0, 1, 0));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataKey(0, 1, 1));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataKey(1, 1, 0));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataKey(1, 1, 1));

        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataKey(0, 0, 1));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataKey(1, 0, 0));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataKey(1, 0, 1));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataKey(0, 1, 0));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataKey(0, 1, 1));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataKey(1, 1, 0));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataKey(1, 1, 1));

        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataKey(0, 0, 1));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataKey(1, 0, 0));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataKey(1, 0, 1));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataKey(0, 1, 0));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataKey(0, 1, 1));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataKey(1, 1, 0));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataKey(1, 1, 1));

        $this->assertNull($this->fault_instance->getTransferMetaDataKey(0, 0, 0));
        $this->assertNull($this->fault_instance->getTransferMetaDataKey(0, 0, 1));
        $this->assertNull($this->fault_instance->getTransferMetaDataKey(1, 0, 0));
        $this->assertNull($this->fault_instance->getTransferMetaDataKey(1, 0, 1));
        $this->assertNull($this->fault_instance->getTransferMetaDataKey(0, 1, 0));
        $this->assertNull($this->fault_instance->getTransferMetaDataKey(0, 1, 1));
        $this->assertNull($this->fault_instance->getTransferMetaDataKey(1, 1, 0));
        $this->assertNull($this->fault_instance->getTransferMetaDataKey(1, 1, 1));
    }

    #[TestDox('getPaymentMetaDataCount()')]
    public function testGetPaymentMetaDataCount()
    {
        $this->assertNull($this->instance_metadata_transfer->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance_metadata_transfer->getPaymentMetaDataCount(1));

        $this->assertNull($this->instance_metadata_bollo->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance_metadata_bollo->getPaymentMetaDataCount(1));

        $this->assertNull($this->fault_instance->getPaymentMetaDataCount(0));
        $this->assertNull($this->fault_instance->getPaymentMetaDataCount(1));

        $this->assertEquals(2, $this->instance_metadata_transfer_payment->getPaymentMetaDataCount(0));
        $this->assertNull($this->instance_metadata_transfer_payment->getPaymentMetaDataCount(1));
    }

    #[TestDox('getCanale()')]
    public function testGetCanale()
    {
        $this->assertNull($this->instance_metadata_transfer->getCanale());
        $this->assertNull($this->instance_metadata_transfer_payment->getCanale());
        $this->assertNull($this->instance_metadata_bollo->getCanale());
        $this->assertNull($this->fault_instance->getCanale());
    }

    #[TestDox('getToken()')]
    public function testGetToken()
    {
        $value = 't0000000000000000000000000000010';
        $this->assertEquals($value, $this->instance_metadata_transfer->getToken());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getToken());
        $this->assertEquals($value, $this->instance_metadata_bollo->getToken());
        $this->assertNull($this->fault_instance->getToken());
    }

    #[TestDox('getStazione()')]
    public function testGetStazione()
    {
        $this->assertNull($this->instance_metadata_transfer->getCanale());
        $this->assertNull($this->instance_metadata_transfer_payment->getCanale());
        $this->assertNull($this->instance_metadata_bollo->getCanale());
        $this->assertNull($this->fault_instance->getCanale());
    }

    #[TestDox('getTransferMetaDataCount()')]
    public function testGetTransferMetaDataCount()
    {
        $this->assertEquals(2, $this->instance_metadata_transfer_payment->getTransferMetaDataCount(0,0));
        $this->assertEquals(2, $this->instance_metadata_transfer_payment->getTransferMetaDataCount(1,0));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataCount(0,1));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataCount(1,1));

        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataCount(0,0));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataCount(1,0));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataCount(0,1));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataCount(1,1));

        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataCount(0,0));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataCount(1,0));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataCount(0,1));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataCount(1,1));

        $this->assertNull($this->fault_instance->getTransferMetaDataCount(0,0));
        $this->assertNull($this->fault_instance->getTransferMetaDataCount(1,0));
        $this->assertNull($this->fault_instance->getTransferMetaDataCount(0,1));
        $this->assertNull($this->fault_instance->getTransferMetaDataCount(1,1));
    }

    #[TestDox('getNoticeNumber()')]
    public function testGetNoticeNumber()
    {
        $this->assertNull($this->instance_metadata_transfer->getNoticeNumber());
        $this->assertNull($this->instance_metadata_transfer_payment->getNoticeNumber());
        $this->assertNull($this->instance_metadata_bollo->getNoticeNumber());
        $this->assertNull($this->fault_instance->getNoticeNumber());
    }

    #[TestDox('getPaymentMetaDataValue()')]
    public function testGetPaymentMetaDataValue()
    {
        $this->assertNull($this->instance_metadata_transfer->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_metadata_transfer->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_metadata_transfer->getPaymentMetaDataValue(1, 0));

        $this->assertNull($this->instance_metadata_bollo->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->instance_metadata_bollo->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_metadata_bollo->getPaymentMetaDataValue(1, 0));

        $this->assertNull($this->fault_instance->getPaymentMetaDataValue(0, 0));
        $this->assertNull($this->fault_instance->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->fault_instance->getPaymentMetaDataValue(1, 0));

        $this->assertEquals('mv_payment_1', $this->instance_metadata_transfer_payment->getPaymentMetaDataValue(0, 0));
        $this->assertEquals('mv_payment_2', $this->instance_metadata_transfer_payment->getPaymentMetaDataValue(0, 1));
        $this->assertNull($this->instance_metadata_transfer_payment->getPaymentMetaDataValue(1, 0));
        $this->assertNull($this->instance_metadata_transfer_payment->getPaymentMetaDataValue(1, 1));
    }

    #[TestDox('getTransferIban()')]
    public function testGetTransferIban()
    {
        $this->assertEquals('IT0000000000000000000000001', $this->instance_metadata_transfer->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_metadata_transfer->getTransferIban(1, 0));
        $this->assertNull($this->instance_metadata_transfer->getTransferIban(2, 0));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_metadata_transfer_payment->getTransferIban(0, 0));
        $this->assertEquals('IT0000000000000000000000002', $this->instance_metadata_transfer_payment->getTransferIban(1, 0));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferIban(2, 0));

        $this->assertNull($this->fault_instance->getTransferIban(0, 0));
        $this->assertNull($this->fault_instance->getTransferIban(1, 0));
        $this->assertNull($this->fault_instance->getTransferIban(0, 1));
        $this->assertNull($this->fault_instance->getTransferIban(1, 1));

        $this->assertEquals('IT0000000000000000000000001', $this->instance_metadata_bollo->getTransferIban(0, 0));
        $this->assertNull($this->instance_metadata_bollo->getTransferIban(1, 0));
    }

    #[TestDox('getImporto()')]
    public function testGetImporto()
    {
        $this->assertEquals('360.00', $this->instance_metadata_transfer->getImporto());
        $this->assertEquals('360.00', $this->instance_metadata_transfer_payment->getImporto());
        $this->assertEquals('216.00', $this->instance_metadata_bollo->getImporto());
        $this->assertNull($this->fault_instance->getImporto());

    }

    #[TestDox('isBollo()')]
    public function testIsBollo()
    {
        $this->assertFalse($this->instance_metadata_transfer->isBollo(0, 0));
        $this->assertFalse($this->instance_metadata_transfer->isBollo(1, 0));

        $this->assertFalse($this->instance_metadata_transfer_payment->isBollo(0, 0));
        $this->assertFalse($this->instance_metadata_transfer_payment->isBollo(1, 0));

        $this->assertFalse($this->fault_instance->isBollo(0, 0));
        $this->assertFalse($this->fault_instance->isBollo(1, 0));
        $this->assertFalse($this->fault_instance->isBollo(0, 1));
        $this->assertFalse($this->fault_instance->isBollo(1, 1));

        $this->assertFalse($this->instance_metadata_bollo->isBollo(0, 0));
        $this->assertTrue($this->instance_metadata_bollo->isBollo(1, 0));
    }

    #[TestDox('getTransferAmount()')]
    public function testGetTransferAmount()
    {
        $this->assertEquals('200.00', $this->instance_metadata_transfer->getTransferAmount(0));
        $this->assertEquals('160.00', $this->instance_metadata_transfer->getTransferAmount(1));

        $this->assertEquals('200.00', $this->instance_metadata_transfer_payment->getTransferAmount(0));
        $this->assertEquals('160.00', $this->instance_metadata_transfer_payment->getTransferAmount(1));

        $this->assertEquals('200.00', $this->instance_metadata_bollo->getTransferAmount(0));
        $this->assertEquals('16.00', $this->instance_metadata_bollo->getTransferAmount(1));

        $this->assertNull($this->fault_instance->getTransferAmount(0));
        $this->assertNull($this->fault_instance->getTransferAmount(1));
    }

    #[TestDox('getBrokerPa()')]
    public function testGetBrokerPa()
    {
        $this->assertNull($this->instance_metadata_transfer->getBrokerPa());
        $this->assertNull($this->instance_metadata_transfer_payment->getBrokerPa());
        $this->assertNull($this->instance_metadata_bollo->getBrokerPa());
        $this->assertNull($this->fault_instance->getBrokerPa());
    }

    #[TestDox('getTransferMetaDataValue()')]
    public function testGetTransferMetaDataValue()
    {
        $this->assertEquals('mv_transfer_1_1', $this->instance_metadata_transfer_payment->getTransferMetaDataValue(0, 0, 0));
        $this->assertEquals('mv_transfer_1_2', $this->instance_metadata_transfer_payment->getTransferMetaDataValue(0, 0, 1));
        $this->assertEquals('mv_transfer_2_1', $this->instance_metadata_transfer_payment->getTransferMetaDataValue(1, 0, 0));
        $this->assertEquals('mv_transfer_2_2', $this->instance_metadata_transfer_payment->getTransferMetaDataValue(1, 0, 1));

        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataValue(2, 0, 0));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataValue(2, 0, 1));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_metadata_transfer_payment->getTransferMetaDataValue(1, 1, 1));

        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_metadata_transfer->getTransferMetaDataValue(1, 1, 1));

        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->instance_metadata_bollo->getTransferMetaDataValue(1, 1, 1));

        $this->assertNull($this->fault_instance->getTransferMetaDataValue(0, 0, 0));
        $this->assertNull($this->fault_instance->getTransferMetaDataValue(0, 0, 1));
        $this->assertNull($this->fault_instance->getTransferMetaDataValue(1, 0, 0));
        $this->assertNull($this->fault_instance->getTransferMetaDataValue(1, 0, 1));
        $this->assertNull($this->fault_instance->getTransferMetaDataValue(0, 1, 0));
        $this->assertNull($this->fault_instance->getTransferMetaDataValue(0, 1, 1));
        $this->assertNull($this->fault_instance->getTransferMetaDataValue(1, 1, 0));
        $this->assertNull($this->fault_instance->getTransferMetaDataValue(1, 1, 1));
    }

    #[TestDox('getAllTokens()')]
    public function testGetAllTokens()
    {
        $value = ['t0000000000000000000000000000010'];
        $this->assertEquals($value, $this->instance_metadata_transfer->getAllTokens());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getAllTokens());
        $this->assertEquals($value, $this->instance_metadata_bollo->getAllTokens());
        $this->assertNull($this->fault_instance->getAllTokens());
    }

    #[TestDox('getPsp()')]
    public function testGetPsp()
    {
        $this->assertNull($this->instance_metadata_transfer->getPsp());
        $this->assertNull($this->instance_metadata_transfer_payment->getPsp());
        $this->assertNull($this->instance_metadata_bollo->getPsp());
        $this->assertNull($this->fault_instance->getPsp());
    }

    #[TestDox('getPaEmittenti()')]
    public function testGetPaEmittenti()
    {
        $value = ['77777777777'];
        $this->assertEquals($value, $this->instance_metadata_transfer->getPaEmittenti());
        $this->assertEquals($value, $this->instance_metadata_transfer_payment->getPaEmittenti());
        $this->assertEquals($value, $this->instance_metadata_bollo->getPaEmittenti());
        $this->assertNull($this->fault_instance->getPaEmittenti());
    }

    #[TestDox('getImportoTotale()')]
    public function testGetImportoTotale()
    {
        $this->assertEquals('360.00', $this->instance_metadata_transfer->getImportoTotale());
        $this->assertEquals('360.00', $this->instance_metadata_transfer_payment->getImportoTotale());
        $this->assertEquals('216.00', $this->instance_metadata_bollo->getImportoTotale());
        $this->assertNull($this->fault_instance->getImportoTotale());
    }

    #[TestDox('getPaymentsCount()')]
    public function testGetPaymentsCount()
    {
        $this->assertEquals(1, $this->instance_metadata_transfer->getPaymentsCount());
        $this->assertEquals(1, $this->instance_metadata_transfer_payment->getPaymentsCount());
        $this->assertEquals(1, $this->instance_metadata_bollo->getPaymentsCount());
        $this->assertEquals(1, $this->fault_instance->getPaymentsCount());
    }

    #[TestDox('getFaultDescription()')]
    public function testGetFaultDescription()
    {
        $this->assertNull($this->instance_metadata_transfer->getFaultDescription());
        $this->assertNull($this->instance_metadata_transfer_payment->getFaultDescription());
        $this->assertNull($this->instance_metadata_bollo->getFaultDescription());
        $this->assertEquals('Errore nel processamento del messaggio', $this->fault_instance->getFaultDescription());

    }

    #[TestDox('getTransferPa()')]
    public function testGetTransferPa()
    {
        $this->assertEquals('77777777777', $this->instance_metadata_transfer->getTransferPa(0));
        $this->assertEquals('77777777778', $this->instance_metadata_transfer->getTransferPa(1));

        $this->assertEquals('77777777777', $this->instance_metadata_transfer_payment->getTransferPa(0));
        $this->assertEquals('77777777778', $this->instance_metadata_transfer_payment->getTransferPa(1));

        $this->assertEquals('77777777777', $this->instance_metadata_bollo->getTransferPa(0));
        $this->assertEquals('77777777778', $this->instance_metadata_bollo->getTransferPa(1));

        $this->assertNull($this->fault_instance->getTransferPa(0));
        $this->assertNull($this->fault_instance->getTransferPa(1));
    }


    #[TestDox('getBrokerPsp()')]
    public function testGetBrokerPsp()
    {
        $this->assertNull($this->instance_metadata_transfer->getPsp());
        $this->assertNull($this->instance_metadata_transfer_payment->getPsp());
        $this->assertNull($this->instance_metadata_bollo->getPsp());
        $this->assertNull($this->fault_instance->getPsp());
    }
}
