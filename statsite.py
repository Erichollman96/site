from flask import Flask, render_template, request, send_file
import pandas as pd
import matplotlib.pyplot as plt
from io import BytesIO

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

#get data from PFR and assign to dataframe "df"
url = 'https://www.pro-football-reference.com/years/2022/rushing.htm'

df = pd.read_html(url, header=1)[0]

# sets limit of rows scraped
df = df[:10]

#casting everything besides "Player" to type float
df['Yds'] = df['Yds'].astype('float')

#####################  P L O T T I N G ###########################



# data values assigned to axes
#y = df['Yds']
#x = df['Player']

#@app.route('/generate_graph', methods=['POST'])
#def generate_graph():
#	# data values assigned to axes
#	y = df['Yds']
#	x = df['Player']
#
# Create a bar graph
#plt.bar(x, y)
#
## Add labels and a title
#plt.ylabel('Yds')
#plt.xlabel('Player')
#
#
#
##rotates x-axis labels
#plt.xticks(rotation=90)
#
##title
#plt.title('StatShow')
#
## Show the plot
#plt.show()
#
## Clear the plot
#plt.clf()
#
## Return the graph as a downloadable file
## return send_file(buffer, as_attachment=True, download_name='graph.png', mimetype='image/png')
#
#if __name__ == '__main__':
    #app.run(debug=True)
#
#############################################################

pd.set_option('display.max_rows', 50)
pd.set_option('display.max_columns', 500)
pd.set_option('display.width', 1000)
print(df)
