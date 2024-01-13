import pandas as pd
import matplotlib.pyplot as plt


#get data from PFR and assign to dataframe "df"
url = 'https://www.pro-football-reference.com/years/2022/passing.htm'

df = pd.read_html(url, header=0)[0]


#####################  P L O T T I N G ###########################

### ISSUE IS THAT THE DATS IS STORED AS STRINGS IN DATAFRAMES ###


# sets limit of rows scraped
df = df[:10]

#casting "Yds" to type float
df['Yds'] = df['Yds'].astype('float')

# axis labeling
y = df['Yds']
x = df['Player']



# Create a bar graph
plt.bar(x, y)

# Add labels and a title
plt.ylabel('Yds')
plt.xlabel('Player')


# inverts axis (wtf?) ## DO NOT USE
# plt.gca().invert_yaxis()


#rotates x-axis labels
plt.xticks(rotation=90)

#title
plt.title('StatShow')

plt.savefig('/home/erich/Projects/NewProjects/footballstats/CurrentGraph.png')

# Show the plot
plt.show()



############################################################

pd.set_option('display.max_rows', 50)
pd.set_option('display.max_columns', 500)
pd.set_option('display.width', 1000)


