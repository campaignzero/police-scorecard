**[↤ Developer Overview](../README.md)**

Development Process
===

> The following is how our projects workflows are in place to help make development easy.

Branch Workflows
---

Our workflow consists of five types of branches, each with different roles:

| BRANCH      | EXAMPLE                     | ROLE                                                         |
|:------------|:----------------------------|:-------------------------------------------------------------|
| `master`    | -                           | Production Ready Code ( PR's from `staging` )                |
| `develop`   | -                           | Code Deployed to Development Environment                     |
| `staging`   | -                           | Code Deployed to Staging Environment ( PR's from `develop` ) |
| `feature/*` | `feature/123-mobile-header` | Based on latest `develop` and Feature Specific               |
| `fix/*`     | `fix/123-broken-form`       | Based on latest `develop` and GitHub Issue Specific          |

Contributing
===

Issues & Feature Requests
---

[![Staging Environment](https://img.shields.io/badge/Github-Create_Issue-red.svg?style=for-the-badge&logo=github&logoColor=ffffff&logoWidth=16)](https://github.com/campaignzero/police-scorecard/issues/new/choose)

### Bug Fix

> We're sorry things are not working as expected, and want to get things fixed ASAP. In order to help us do that, we need a few things from you.

1. Create a [New Issue](https://github.com/campaignzero/police-scorecard/issues/new/choose)
2. Enter a Short but Descriptive Title for the Issue
3. Use the Template Provided and fill in as much as you can, if something does not apply, enter `N/A`
4. Look for the `Labels` section, and select `Bug Report` from the drop down menu
5. Click `Submit new issue` button

### Feature Request

> Got an idea for a new feature? We'd love to hear it! In order to get this knocked out, we will need a few things from you.

1. Create a [New Issue](https://github.com/campaignzero/police-scorecard/issues/new/choose)
2. Enter a Short but Descriptive Title for the Feature Request
3. Use the Template Provided and fill in as much as you can, if something does not apply, enter `N/A` ( you can delete the `Steps to Duplicate:` section as that does not apply )
4. Look for the `Labels` section, and select `Feature Request` from the drop down menu
5. Click `Submit new issue` button

Pull Requests
---

[![Staging Environment](https://img.shields.io/badge/Github-Create_Pull_Request-blue.svg?style=for-the-badge&logo=github&logoColor=ffffff&logoWidth=16)](https://github.com/campaignzero/police-scorecard/compare)

### Bug Fix

> Each Bug Fix reported on GitHub should have its own `fix/*` branch.  The branch name should be formatted `fix/###-issue-name` where `###` is the GitHub Issue Number, and `issue-name` is a 1-3 word summary of the issue.

1. Checkout latest `develop` branch
2. Pull down the latest changes via `git pull`
3. Create a new branch with the structure `fix/*`, e.g. `fix/123-broken-form`
4. When you are ready to submit your code, submit a new Pull Request that merges your code into `develop`
5. Tag your new Pull Request with `Ready for Code Review`

### Feature Request

> Each New Feature should reside in its own `feature/` branch. The branch name should be formatted `feature/###-feature-name` where `###` is the GitHub Issue Number, and `feature-name` is a 1-3 word summary of the feature.

1. Checkout latest `develop` branch
2. Pull down the latest changes via `git pull`
3. Create a new branch with the structure `feature/*`, e.g. `feature/123-mobile-header`
4. When you are ready to submit your code, submit a new Pull Request that merges your code into `develop`
5. Tag your new Pull Request with `Ready for Code Review`

Continuous Integration
===

We have three Environments, each set up with Continuous Integration and independent URLs for testing.

| ENVIRONMENT | BRANCH |
|:------------|:-------|
|[![Production Environment](https://img.shields.io/badge/ENV-Production-red.svg?style=for-the-badge&logo=digitalocean&logoColor=ffffff&logoWidth=16)](https://policescorecard.org)|`master`|
|[![Staging Environment](https://img.shields.io/badge/ENV-Staging-blue.svg?style=for-the-badge&logo=digitalocean&logoColor=ffffff&logoWidth=16)](https://staging.policescorecard.org)|`staging`|
|[![Development Environment](https://img.shields.io/badge/ENV-Development-green.svg?style=for-the-badge&logo=digitalocean&logoColor=ffffff&logoWidth=16)](https://dev.policescorecard.org)|`develop`|

- [X] **Production** is deployed with any Pull Request that is merged into the `master` branch
- [X] **Staging** is deployed with any Pull Request that is merged into the `staging` branch
- [X] **Development** is deployed with any Pull Request that is merged into the `develop` branch
