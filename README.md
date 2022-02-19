# Gamblytics

Gamblytics is the Z14 group web project for COMP10120. It aims to simplify and help players in betting based games to track their profits and losses as well as provide insightful statistics to aide their performance.

## Contributing
Leave the master branch alone. The master branch is only for new releases of features that have been fully tested and verified.

The development branch is intended to be a staging area before changes are made to the master branch.

Create "feature branches" from the development branch in order to work on a new feature, create a merge request into the development branch once the feature is finished. Try to have at least one other person check your code before it is merged.

### Commits
Try to follow the [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/#summary) format for commits. In short this means the first line of the commit should start with either `fix` or `feat` and should include a `!` if this is a breaking change. Additionally breaking changes should be discussed in the commit footer.

```
<type>(!): Commit Title Goes Here

Commit body goes here. 

This could be one or more paragraphs describing the changes

Breaking-Changes: In the footer describe any breaking changes
Fix: #1, #2, #3 (This is where GitLab issue numbers can be referenced)
```