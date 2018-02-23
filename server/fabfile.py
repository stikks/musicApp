# from __future__ import with_statement
from fabric.api import local, abort, settings, run, env, cd, sudo
from fabric.contrib.console import confirm

env.roledefs = {
    'dev': ['localhost'],
    'prod': ['root@737apps.com']
}

env.roledefs['all'] = [h for r in env.roledefs.values() for h in r]


def commit(message='updating...'):
    """
    commit changes to staging area
    :param message:
    :return:
    """
    local("git add --all")
    with settings(warn_only=True):
        result = local("git commit -m '%s'" % message, capture=True)
        if result.failed and not confirm("Tests failed. Continue anyway?"):
            abort("Aborting at your behest")


def pull():
    """
    update environment
    :return:
    """
    local("git pull")


def migrate(is_local=True):
    """
    update environment
    :return:
    """
    if is_local:
        local("php artisan migrate")
    else:
        run("php artisan migrate")


def update_environs(message='updating...'):
    """
    update local working environment
    :return:
    """
    commit(message)
    pull()
    migrate()


def push(message='updating...', should_commit=True, branch='master'):
    """
    push changes
    :return:
    """
    if should_commit is True:
        commit(message)
    local("git push -u origin %s" % branch)


def start_services(service_paths=list()):
    """
    restart a system service
    :param service_paths:
    :return:
    """
    for _service in service_paths:
        sudo('systemctl start %s' % _service)


def stop_service(service_paths=list()):
    """
    restart a system service
    :param service_paths:
    :return:
    """
    for _service in service_paths:
        sudo('systemctl stop %s' % _service)


def restart_service(service_paths=list()):
    """
    restart a system service
    :param service_paths:
    :return:
    """
    for _service in service_paths:
        sudo('systemctl restart %s' % _service)


def clear(is_remote=False):
    """
    clear configuration
    """
    if is_remote:
        run('php artisan config:clear')
        run('php artisan config:cache')
        run('php artisan view:clear')
        return

    local('php artisan config:clear')
    local('php artisan config:cache')
    local('php artisan view:clear')
    return


def deploy():
    """
    update production environment
    :return:
    """
    with cd('/var/www/html/musicApp'):
        sudo('git pull')
        clear(True)
        restart_service(['httpd'])


def migrate_deploy():
    """
    update production environment
    :return:
    """
    with cd('/var/www/html/musicApp'):
        sudo('git pull')
        migrate(is_local=False)
        clear(True)
        restart_service(['httpd'])


def full_deploy():
    """
    update production environment
    :return:
    """
    with cd('/var/www/html/musicApp'):
        sudo('git pull')
        sudo('composer install')
        migrate(is_local=False)
        clear(True)
        restart_service(['httpd'])