from instaloader import Instaloader, Profile
from datetime import datetime, timedelta
import os
import shutil
import github

path_github = 'github'
if os.path.exists(path_github):
    github.exclui_repositorio(path_github)
    github.git_clone()
else:
    github.git_clone()

path_instagram = 'ifmtcuiabaoficial'
if os.path.exists(path_instagram):
    shutil.rmtree(path_instagram)
# Função responsável por executar o download das publicações do Instagram Oficial do IFMT
# Realiza o download das publicações dos últimos 5 dias
data_inicio = datetime.today() - timedelta(days=5)
L = Instaloader()
PROFILE = 'ifmtcuiabaoficial'
profile = Profile.from_username(Instaloader().context, PROFILE)
post_sorted = sorted(profile.get_posts(),
                     key=lambda post: post.likes, reverse=True)
for post in post_sorted:
    # Faz o download das publicações que estão dentro do prazo estabelecido e as que estão fixadas
    if post.date >= data_inicio or post.is_pinned:
        L.download_post(post, PROFILE)
# Chama a função de correção da pasta com os arquivos do Instagram
