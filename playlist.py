import vlc
import configparser

# Carrega as informações da playlist a partir do arquivo .pls
config = configparser.ConfigParser()
config.read('playlist.pls')

# Pega a URL da primeira música na playlist
media_url = config['playlist']['File1']

# Inicializa o VLC e carrega a música
instance = vlc.Instance()
player = instance.media_player_new()
media = instance.media_new(media_url)
player.set_media(media)

# Reproduz a música
player.play()

# Mantém o programa rodando enquanto a música está tocando
while player.get_state() != vlc.State.Ended:
    continue
