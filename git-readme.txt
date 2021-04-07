gitbucket
gitlab
github


Work Directory		Stating Area		Local Repository	remote Repository

git add			git commit		git push->		.....

							...		<- git fetch		
............								<- git clone


git diff ..		  ..
git diff HEAD |
git merge     | 				  ....
git checkout  |			



-----------------------------------------------------------

git init
git config --global user.name "Shamim Ahmed"
git config --global user.email "cseshamim47@gmail.com"

git config user.name "Shamim Ahmed"
git config user.email "cseshamim47@gmail.com"

git config --list
clear

git status 
git add ./--all/filename
git commit
git commit -m "message"

git log
git log --oneline

git checkout #commit_code
git checkout master

git diff --staged

git rm filename.extension
git reset HEAD filename
git clean 


ssh-keygen -t rsa -b 4096 -C "cseshamim47@gmail.com" // doesn't work for all

eval `ssh-agent -s`
ssh-add ~/.ssh/id_ed25519  // not working
ssh-add ~/.ssh/id_rsa      // not working


ssh-keygen -t rsa -C “your-email-address”
ssh-keygen -t ed25519 -C "cseshamim47@gmail.com"
Enter file in which to save the key (/c/Users/User/.ssh/id_ed25519): /c/Users/User/.ssh/choose dir
ls -al ~/.ssh
eval `ssh-agent -s`
ssh-add ~/.ssh/dir
cat ~/.ssh/file.pub
clip < ~/.ssh/file.pub


git clone http:filelink filename


git fetch 
git status
git pull


git branch branchname
git branch
git checkout branchname
git checkout -b home-branch
git checkout master
git merge home-branch

git branch -D branchName


git stash
git stash pop/apply
git stash list

git clean -f -n
git clean -f


git remote add upstream https://github.com/ahmedshanto/nnsel.git
git fetch upstream
git checkout master
git rebase upstream/master
git push -f origin master




