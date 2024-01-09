#include <bits/stdc++.h>
using namespace std;


char adj[1001][1001];
int n,m;
bool vis[1001][1001];
vector<char> path;

int dx[] = {-1, 1, 0, 0,-1,-1, 1,1};
int dy[] = { 0, 0,-1, 1,-1, 1,-1,1};

bool isFound;
bool isValid(int i, int j)
{
    if(i == n || j == m || i < 0 || j < 0 || vis[i][j] || isFound || adj[i][j] == '#') return false;

    return true;
}

map<pair<int,int>,pair<int,int>> par;
pair<int,int> B;
void bfs(int i, int j)
{
    queue<pair<int,int>> q;
    q.push({i,j});
    par[{i,j}] = {-1,-1};
    vis[i][j] = true;

    while(q.size() > 0)
    {
        int i = q.front().first;
        int j = q.front().second;
        if(adj[i][j] == 'B')
        {
            B = {i,j};
            isFound = true;
        }
        q.pop();

        for(int x = 0; x < 4; x++)
        {
            int ii = dx[x] + i;
            int jj = dy[x] + j;
            if(isValid(ii,jj))
            {
                // cout << ii << " - " << jj << endl;
                q.push({ii,jj});
                vis[ii][jj] = true;   
                par[{ii,jj}]={i,j};
            }
        }

    }
}



int main()
{
    cin >> n >> m;
    int ii,jj;
    ii = jj = -1;
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            cin >> adj[i][j];
            if(adj[i][j] == 'A')
            {
                ii = i;
                jj = j;
            }
        }
    }
    

    if(ii == -1)
    {
        cout << "NO" << endl;
    }else
    {
        bfs(ii,jj);
        if(isFound)
        {
            cout << "YES" << endl;
            while(par[B] != (pair<int,int>){-1,-1})
            {
                int i = B.first;
                int j = B.second;
                B = par[B];
                int ii = B.first;
                int jj = B.second;
                if(ii == i)
                {
                    if(j < jj) path.push_back('L');
                    else 
                    {
                        path.push_back('R');
                    }
                }else 
                {
                    if(i < ii) path.push_back('U');
                    else 
                    {
                        path.push_back('D');
                    }
                }
            }
            cout << path.size() << endl;
            reverse(path.begin(),path.end());
            for(auto x: path) cout << x;
            cout << endl;
        }else 
        {   
            cout << "NO" << endl;
        }
    }

    
}