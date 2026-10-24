# Security Policy

## Reporting Security Issues

Leadix is an open-source multi-tenant CRM portfolio project developed by Ali Harti. Security vulnerabilities and architectural concerns are taken seriously.

If you identify a security issue, vulnerability, or tenant data isolation flaw within this codebase, please report it responsibly rather than opening a public issue.

### Reporting Channels
* **Email**: ali.harti.dev@gmail.com
* **Subject Line**: `[SECURITY VULNERABILITY] Leadix - <Brief Vulnerability Description>`
* **GPG Key**: Available upon request for encrypted communications.

### Report Contents
Please provide the following details to facilitate investigation:
1. Description of the vulnerability and its potential impact (e.g., cross-tenant data access, IDOR, SQL injection, privilege escalation).
2. Step-by-step reproduction instructions or proof-of-concept (PoC) payload.
3. Affected components, models, controllers, or database migrations.
4. Proposed mitigation or patch if identified.

### Response SLA and Timeline
* **Initial Acknowledgement**: Within 48 hours of receipt.
* **Triage and Impact Assessment**: Within 5 business days.
* **Remediation Target**: Within 14 business days depending on severity.
* **Public Disclosure**: Coordinated release following deployment of fixes or confirmation.

---

## Scope

### In-Scope
* Multi-tenant boundary isolation and `TenantScope` bypasses (Eloquent queries, raw SQL, unscoped models).
* Broken Object Level Authorization (BOLA/IDOR) across leads, deals, contacts, invoices, payments, and organizations.
* Broken Function Level Authorization (role-based access control bypasses across Admin, Sales, and Finance).
* Financial data integrity flaws (double billing, race conditions on payments, balance tampering).
* Authentication, session fixation, and credential handling.
* Input validation, SQL injection, XSS in Blade templates, and CSRF token enforcement.

### Out-of-Scope
* Denial of service (DoS) attacks targeting local test servers.
* Theoretical attacks requiring root-level filesystem or direct database access on the host.
* Social engineering or phishing simulations.
* Flaws in development-only debugging tools (`routes/debug.php`) when explicitly documented as development-only.

---

## Security Architecture Summary

Leadix implements a shared-database, shared-schema multi-tenancy model using Laravel Eloquent global scopes (`TenantScope`) keyed by `organization_id`.

| Control Domain | Implementation Mechanism | Status |
| :--- | :--- | :--- |
| Multi-Tenancy Scoping | `App\Traits\BelongsToOrganization` and `TenantScope` | 🟡 Partial |
| Password Storage | Bcrypt with work factor 12 (`BCRYPT_ROUNDS=12`) | ✅ Implemented |
| Authentication Sessions | Database/Cookie session driver with regeneration on login | ✅ Implemented |
| Brute-Force Protection | Rate limiting on authentication (`5 requests / minute`) | ✅ Implemented |
| Role-Based Authorization | Role string checks (`hasRole()`) on User model | 🟡 Partial |
| Financial Decimal Precision | MySQL/SQLite `DECIMAL(15, 2)` for currency calculations | ✅ Implemented |
| Double-Payment Protection | Explicit state checks and transactional rollbacks | 🔲 Planned |
| Comprehensive Policies | Dedicated Laravel Policy classes per resource | 🔲 Planned |
| Encrypted Data at Rest | Column-level encryption for sensitive PII | 🔲 Planned |

For a comprehensive review of architectural vulnerabilities, threat modeling, and planned hardening items, refer to the [Security Section in README.md](README.md#security).
