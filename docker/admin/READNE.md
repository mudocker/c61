sudo mkdir -p /etc/docker
sudo tee /root/.bashrc<<-'EOF'
# .bashrc

alias da='docker attach ${ver}'
alias dall='docker ps -a'
alias db='docker build  --compress -t dockerliweipei/yongli:${ver} .'
alias de='docker exec -it ${ver} bash'
alias dl='docker logs ${ver}'
alias dp='docker push dockerliweipei/yongli:${ver}'
alias dr='docker rm $(docker ps -a -q)'
alias drmi='docker rmi $(docker images | awk "{print $3}")'
alias drun='docker run -d --privileged -p 3306:3306  --name ${ver} dockerliweipei/yongli:${ver}'
alias ds='docker stop $(docker ps -a -q)'
alias dver='set ver="web"'

alias rm='rm -i'
alias cp='cp -i'
alias mv='mv -i'

if [ -f /etc/bashrc ]; then
	. /etc/bashrc
fi
EOF


source /root/.bashrc
export ver='db'
cat /root/.bashrc
