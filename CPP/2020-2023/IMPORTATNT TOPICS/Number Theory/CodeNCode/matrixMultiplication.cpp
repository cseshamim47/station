#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n,m;

    cin >> n;    
    int a[n][n];
    int b[n][n];
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            cin >> a[i][j];
        }
    }
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            cin >> b[i][j];
        }
    }

    int ans[n][n];
    memset(ans,0,sizeof ans);
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            for(int k = 0; k < n; k++)
            {
                ans[i][j] += (a[i][k]*b[k][j]);
            }
        }
    }
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            
            cout << ans[i][j] << " ";
            
        }
        cout << endl;
    }

    


}