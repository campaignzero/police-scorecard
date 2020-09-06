**[↤ Developer Overview](../README.md)**

Development Process
===

> The following is how our projects are setup, and the workflows in place to help make development easy on everyone.

Branch Workflows
---

Our workflow consists of five types of branches, each with different roles:

| BRANCH      | EXAMPLE                 | ROLE                                            |
|:------------|:------------------------|:------------------------------------------------|
| `master`    | -                       | Production Ready Code                           |
| `develop`   | -                       | Integration Branch before Merging into `master` |
| `feature/*` | `feature/mobile-header` | Based on latest `develop` and Feature Specific  |
| `release/*` | `release/v1.2.3`        | Based on latest `develop` and Release Specific  |
| `hotfix/*`  | `hotfix/mobile-menu`    | Based on latest `master` and Hotfix Specific    |

Here is an example of how code flows through this repository:

![Gitflow Workflow](img/gitflow-workflow.png)

Creating New Branches
===

Feature
---

1. Checkout latest `develop` branch
2. Pull down the latest changes via `git pull`
3. Create a new branch with the structure `feature/*`, e.g. `feature/mobile-header`
4. When you are ready to submit your code, submit a new Pull Request that merges your code into `develop`
5. Tag your new Pull Request with `Ready for Code Review`

Hotfix
---

**NOTE:**  New Hotfix Branches should only be created by the Release Manager.

1. Checkout latest `master` branch
2. Pull down the latest changes via `git pull`
3. Create a new branch with the structure `hotfix/*`, e.g. `hotfix/mobile-menu`
4. When you are ready to submit your code, submit a new Pull Request that merges your code into `master`
5. Tag your new Pull Request with `Ready for Code Review`

Release
---

**NOTE:**  New Release Branches should only be created by the Release Manager.

1. Checkout latest `develop` branch
2. Pull down the latest changes via `git pull`
3. Create a new branch with the structure `release/*`, e.g. `release/v1.2.3`
4. When you are ready to submit your code, submit a new Pull Request that merges your code into `master`
5. Tag your new Pull Request with `Ready for Code Review`

Continuous Integration
===

We have three Environments, each setup with Continuous Integration and independent URLs for testing.

| ENVIRONMENT | TAG | BRANCH | SOURCE BRANCH |
|:------------|:----|:-------|:-----|
|[![Production Environment](https://img.shields.io/badge/ENV-Production-red.svg?style=for-the-badge&logo=digitalocean&logoColor=ffffff&logoWidth=16)](https://policescorecard.org)|`vx.x.x`|-|`master`|
|[![Staging Environment](https://img.shields.io/badge/ENV-Staging-blue.svg?style=for-the-badge&logo=digitalocean&logoColor=ffffff&logoWidth=16)](https://staging.policescorecard.org)| `staging-*`|-|`release/*` or `hotfix/*`
|[![Development Environment](https://img.shields.io/badge/ENV-Development-green.svg?style=for-the-badge&logo=digitalocean&logoColor=ffffff&logoWidth=16)](https://dev.policescorecard.org)|-|`develop`|`develop`|

- [X] **Production** is deployed when a Tagged Branch matching `vx.x.x` is created from `master`
- [X] **Staging** is deployed when a Tagged Branch matching `staging-*` is created from a `release/*` or `hotfix/*` branch
- [X] **Development** is deployed with any Pull Request that is merged into the `develop` branch
