#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n,m;
    cin >> n >> m;
    char arr[n][m]{0};
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            cin >> arr[i][j];
        }
    }
    
    if(arr[0][0] == '1') 
    {
        cout << -1 << endl;
        return;
    }

    vector<vector<int>> ans;
    int cnt = 0;
    for(int i = n-1; i >= 0; i--)
    {
        for(int j = m-1; j >= 0; j--)
        {
            if(arr[i][j] == '1')
            {
                vector<int> v;
                cnt++;
                if(j==0)
                {
                    v.push_back(i-1);
                    v.push_back(j);
                    v.push_back(i);
                    v.push_back(j);
                }else
                {
                    v.push_back(i);
                    v.push_back(j-1);
                    v.push_back(i);
                    v.push_back(j);
                }
                ans.push_back(v);
            }
        }
    }

    cout << cnt << endl;
    for(int i = 0; i < cnt; i++)
    {
        for(int j = 0; j < 4; j++)
        {
            cout << ans[i][j]+1 << " ";
        }
        cout << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}