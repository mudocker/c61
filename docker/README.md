#docker
docker-composer up -d
#案例
https://blog.csdn.net/zhuchunyan_aijia/article/details/80111629
https://blog.csdn.net/qq_36148847/article/details/79427878
https://docs.docker.com/compose/



#安装
yum -y install epel-release
yum -y install python-pip
pip install --upgrade pip
pip install docker-compose
docker-compose --version


#db编码
    environment:
      LANG: C.UTF-8

sudo tee /root/.bashrc<<-'EOF'
# .bashrc
alias da='docker attach ${ver}'
alias dall='docker ps -a'
alias db='docker build  --compress -t dockerliweipei/c61:${ver} .'
alias de='docker exec -it ${ver} bash'
alias dl='docker logs ${ver}'
alias dp='docker push dockerliweipei/c61:${ver}'
alias dcb='docker-compose up -d --build'
alias dcp='docker-compose push'
alias dr='docker rm $(docker ps -a -q)'
alias drmi='docker rmi $(docker images | awk "{print $3}")'
alias drun='docker run -d --privileged -p 3306:3306  --name ${ver} dockerliweipei/c61:${ver}'
alias ds='docker stop $(docker ps -a -q)'
alias dver='set ver="web"'
alias gr='git fetch --all &&git reset --hard origin/master'

alias rm='rm -i'
alias cp='cp -i'
alias mv='mv -i'
if [ -f /etc/bashrc ]; then
	. /etc/bashrc
fi

EOF
source /root/.bashrc