#include <bits/stdc++.h>
using namespace std;

const int MAX = 1e3+10;

int graph1[MAX][MAX];

vector<pair<int,int>> graph2[MAX];
int main()
{
    int v,e;
    cin >> v >> e;

    for (int i = 0; i < e; i++)
    {
        int a,b,wt;
        cin >> a >> b >> wt;
        graph1[a][b] = wt; // matrix SC : N * N
        graph1[b][a] = wt;

        graph2[a].push_back({b,wt});
        graph2[b].push_back({a,wt});

    }

    //  check if 1,6 and 3,5 is connected or not, print the weight
    if(graph1[1][6]) cout << graph1[1][6] << endl;
    else cout << 1 << " " << 6 << " is not connected" << endl;

    if(graph1[3][5]) cout << "Weight : " << graph1[3][5] << endl; // check tc : O(1)
    else cout << 3 << " " << 5 << " is not connected" << endl;

    cout << endl;

    int sz = graph2[3].size();

    for(pair<int,int> child : graph2[3]) // check tc : o(n)
    {
        // if(child.first == 5)
        // {
        //     cout << "weight :  " << child.second << endl;
        // }
        cout << 3 << " " << child.first << " " << child.second << endl;
    }
        
}


/* 
6 9
1 3 10
1 5 2
3 5 5
3 4 8
3 6 12
3 2 9
2 6 6
4 6 1
5 6 7 
*/