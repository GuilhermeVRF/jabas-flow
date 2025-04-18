from flask import Flask, request
import plotly.graph_objs as go
import plotly.io as pio

app = Flask(__name__)

@app.route('/incomeXExpense', methods=['POST'])
def income_x_expense():
    data = request.json
    income = data.get('income', 0)
    expense = data.get('expense', 0)

    categorias = ['Receita', 'Despesa']
    valores = [income, expense]

    fig = go.Figure(data=[go.Bar(
        x=categorias,
        y=valores,
        marker_color=['#4CAF50', '#F44336']
    )])

    fig.update_layout(yaxis_title='Valor (R$)')

    html = pio.to_html(fig, full_html=True)

    return html

@app.route('/incomeEvolution', methods=['POST'])
def income_evolution():
    data = request.json.get('data', {})
    html = generic_evolution_graph(data, cor='#4CAF50', titulo='Evolução das Receitas Mensais')
    return html


@app.route('/expenseEvolution', methods=['POST'])
def expense_evolution():
    data = request.json.get('data', {})
    html = generic_evolution_graph(data, cor='#F44336', titulo='Evolução das Despesas Mensais')
    return html

def generic_evolution_graph(data, cor, titulo):
    meses = list(data.keys())
    valores = list(data.values())
    
    fig = go.Figure(data=go.Scatter(
        x=meses,
        y=valores,
        mode='lines+markers',
        line=dict(color=cor, width=3),
        marker=dict(size=6)
    ))

    fig.update_layout(
        title=titulo,
        xaxis_title='Mês',
        yaxis_title='Receita (R$)',
        margin=dict(l=20, r=20, t=40, b=40),
    )

    return pio.to_html(fig, full_html=False, include_plotlyjs='cdn')

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5001)
