pipeline {
  agent any
  stages {
    stage('Create archive') {
      steps {
        sh '''cd $WORKSPACE
ls
mv last_version .last_version
'''
      }
    }
  }
}