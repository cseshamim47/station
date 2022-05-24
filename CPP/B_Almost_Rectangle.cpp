#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    char arr[n][n];
    pair<int,int> f = {-1,-1};
    pair<int,int> s;
    for (int i = 0; i < n; i++)
    {
        for (int j = 0; j < n; j++)
        {
            cin >> arr[i][j];
            if(arr[i][j] == '*' && f.first == -1)
            {
                f = make_pair(i,j);
            }else if(arr[i][j] == '*') s = make_pair(i,j);
        }   
    }

    if(f.first == s.first)
    {
        if(f.first == 0)
        {
            arr[f.first+1][f.second] = '*';
            arr[f.first+1][s.second] = '*';
        }else
        {
            arr[f.first-1][f.second] = '*';
            arr[f.first-1][s.second] = '*';
        } 
    }else if(f.second == s.second)
    {
        if(f.second == 0)
        {
            arr[f.first][s.second+1] = '*';
            arr[s.first][s.second+1] = '*';
        }else
        {
            arr[f.first][s.second-1] = '*';
            arr[s.first][s.second-1] = '*';
        } 

    }
    arr[f.first][s.second] = '*';
    arr[s.first][f.second] = '*';

    for(auto &i : arr)
    {
        for(auto j : i) cout << j;
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