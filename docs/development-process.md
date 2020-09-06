**[↤ Developer Overview](../README.md)**

Development Process
===

> The following is how our projects workflows are in place to help make development easy.

Branch Workflows
---

Our workflow consists of five types of branches, each with different roles:

| BRANCH      | EXAMPLE                 | ROLE                                                |
|:------------|:------------------------|:----------------------------------------------------|
| `develop`   | -                       | Integration Branch before Merging into `master`     |
| `master`    | -                       | Production Ready Code                               |
| `feature/*` | `feature/mobile-header` | Based on latest `develop` and Feature Specific      |
| `fix/*`     | `fix/123-broken-form`   | Based on latest `develop` and GitHub Issue Specific |
| `hotfix/*`  | `hotfix/mobile-menu`    | Based on latest `master` and Hotfix Specific        |
| `release/*` | `release/v1.2.3`        | Based on latest `develop` and Release Specific      |

Here is an example of how code flows through this repository:

![Gitflow Workflow](img/gitflow-workflow.png)

Creating New Branches
===

Feature
---

> Each New Feature should reside in its own `feature/` branch. The branch name should be formatted `feature/feature-name` where `feature-name` is a 1-3 word summary of the new feature.

1. Checkout latest `develop` branch
2. Pull down the latest changes via `git pull`
3. Create a new branch with the structure `feature/*`, e.g. `feature/mobile-header`
4. When you are ready to submit your code, submit a new Pull Request that merges your code into `develop`
5. Tag your new Pull Request with `Ready for Code Review`

Fix
---

> Each Bug Fix reported on GitHub should have its own `fix/*` branch.  The branch name should be formatted `fix/###-issue-name` where `###` is the GitHub Issue Number, and `issue-name` is a 1-3 word summary of the issue.

1. Checkout latest `develop` branch
2. Pull down the latest changes via `git pull`
3. Create a new branch with the structure `fix/*`, e.g. `fix/123-broken-form`
4. When you are ready to submit your code, submit a new Pull Request that merges your code into `develop`
5. Tag your new Pull Request with `Ready for Code Review`

Hotfix
---

> Emergency Hotfixes should reside in their own `hotfix/` branch.  The branch name should be formatted `hotfix/hotfix-name` where `hotfix-name` is a 1-3 word summary of the new hotfix.

**NOTE:**  New Hotfix Branches should only be created by the Release Manager.

1. Checkout latest `master` branch
2. Pull down the latest changes via `git pull`
3. Create a new branch with the structure `hotfix/*`, e.g. `hotfix/mobile-menu`
4. When you are ready to submit your code, submit a new Pull Request that merges your code into `master`
5. Tag your new Pull Request with `Ready for Code Review`

Release
---

> Each New Release should reside in its own `release/` branch.  The branch name should be formatted `release/v#.#.#` where `v#.#.#` is the next version number to be deployed. Our version numbers use [Semantic Versioning](https://semver.org/), e.g. MAJOR.MINOR.PATCH.

**NOTE:**  New Release Branches should only be created by the Release Manager.

1. Checkout latest `develop` branch
2. Pull down the latest changes via `git pull`
3. Create a new branch with the structure `release/*`, e.g. `release/v1.2.3`
4. When you are ready to submit your code, submit a new Pull Request that merges your code into `master`
5. Tag your new Pull Request with `Ready for Code Review`

Continuous Integration
===

We have three Environments, each set up with Continuous Integration and independent URLs for testing.

| ENVIRONMENT | TAG | BRANCH | SOURCE BRANCH |
|:------------|:----|:-------|:-----|
|[![Production Environment](https://img.shields.io/badge/ENV-Production-red.svg?style=for-the-badge&logo=digitalocean&logoColor=ffffff&logoWidth=16)](https://policescorecard.org)|`vx.x.x`|-|`master`|
|[![Staging Environment](https://img.shields.io/badge/ENV-Staging-blue.svg?style=for-the-badge&logo=digitalocean&logoColor=ffffff&logoWidth=16)](https://staging.policescorecard.org)| `staging-*`|-|`release/*` or `hotfix/*`
|[![Development Environment](https://img.shields.io/badge/ENV-Development-green.svg?style=for-the-badge&logo=digitalocean&logoColor=ffffff&logoWidth=16)](https://dev.policescorecard.org)|-|`develop`|`develop`|

- [X] **Production** is deployed when a Tagged Branch matching `vx.x.x` is created from `master`
- [X] **Staging** is deployed when a Tagged Branch matching `staging-*` is created from a `release/*` or `hotfix/*` branch
- [X] **Development** is deployed with any Pull Request that is merged into the `develop` branch
