import pypdf

with open('P4-SPK Rekayasa Perangkat Lunak (1).pdf', 'rb') as file, open('pdf_content_utf8.txt', 'w', encoding='utf-8') as out:
    reader = pypdf.PdfReader(file)
    text = ''
    for page in reader.pages:
        text += page.extract_text()
    out.write(text)
