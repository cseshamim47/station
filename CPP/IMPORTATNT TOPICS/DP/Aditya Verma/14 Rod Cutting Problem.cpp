#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

int rodCutting(int* pcs,int* pr,int n)
{
    int t[n+1][n+1]; 
    for(int i = 0; i < n+1; i++)
    {
        for(int j = 0; j < n+1; j++)
        {
            if(i==0) t[i][j] = 0;
            if(j==0) t[i][j] = 0;
        }
    }

    for(int i = 1; i < n+1; i++)
    {
        for(int j = 1; j < n+1; j++)
        {
            if(pcs[i-1] <= j)
            {
                t[i][j] = max(t[i-1][j],pr[i-1]+t[i][j-i]);
            }
            else 
                t[i][j] = t[i-1][j];

            cout << t[i][j] << " ";
        }
        cout << endl;
    }

    return t[n][n];
}

void solve()
{
    int n;
    cin >> n;
    int pcs[n];
    int pr[n];
    for(int i = 0; i < n; i++)
    {
        pcs[i] = i+1;
        cin >> pr[i];
    }

    cout << rodCutting(pcs,pr,n) << endl;
    // cout << "eee" << endl;
    
}

int32_t main()
{
    solve();
}