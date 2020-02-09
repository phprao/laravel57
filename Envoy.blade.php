@servers(['web' => 'root@192.168.2.201'])

@task('deploy')
    cd /mydata/data
    cat outer.log
@endtask
