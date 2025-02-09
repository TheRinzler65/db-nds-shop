FROM devkitpro/devkitarm

LABEL maintainer="rinzler65 <leo.gruet65@gmail.com>"

RUN echo "deb http://deb.debian.org/debian stable main contrib non-free" >> /etc/apt/sources.list

RUN apt-get update && apt-get install -y python3-pip python3-venv

RUN python3 -m venv /env

RUN /env/bin/pip install --upgrade pip setuptools wheel && \
    /env/bin/pip install beautifulsoup4==4.11.1 markdownify==0.9.0 numpy==2.0.0 Pillow==10.4.0 python-dateutil==2.8.1 PyYAML==6.0.1 qrcode==6.1 requests==2.32.2 Unidecode==1.3.4

ENV PATH="/env/bin:$PATH"

CMD ["/bin/bash"]
