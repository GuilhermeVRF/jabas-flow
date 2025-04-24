FROM python:3.10-slim

WORKDIR /app

COPY requirements.txt .
RUN pip install -r requirements.txt
RUN python -m spacy download pt_core_news_sm

COPY . .

CMD ["python", "app.py"]
