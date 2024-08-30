FROM ubuntu:latest
LABEL authors="janpe"

ENTRYPOINT ["top", "-b"]
