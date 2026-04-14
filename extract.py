import subprocess
import sys

def install_and_extract():
    try:
        import pypdf
    except ImportError:
        subprocess.check_call([sys.executable, "-m", "pip", "install", "pypdf"])
        import pypdf
    
    with open('P4-SPK Rekayasa Perangkat Lunak (1).pdf', 'rb') as file:
        reader = pypdf.PdfReader(file)
        text = ''
        for page in reader.pages:
            text += page.extract_text()
        print(text)

install_and_extract()
