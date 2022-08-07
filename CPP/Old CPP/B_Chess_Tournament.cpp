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
    string str;
    cin >> str;
    n = str.size();
    char ans[n][n]={};
    
    int second = 0;
    for(int i = 0; i < n; i++) if(str[i]=='2') second++;
    if(second == 2 || second == 1)
    {
        cout << "NO" << endl;
        return;
    }
    cout << "YES" << endl;
    for(int i = 0; i < n; i++)
    {
        bool disi = false;
        for(int j = 0; j < n; j++)
        {
            if(i == j)
            {
                ans[i][j] = 'X';
                continue;
            }

            if(ans[i][j] == '+' || ans[i][j] == '-' || ans[i][j] == '=' || ans[i][j] == 'X')
            {
                continue;
            }

            if(str[i] == '1')
            {
                 ans[i][j] = '=';
                 ans[j][i] = '=';
                 continue;
            }

            if (str[j]=='1'){
                ans[i][j]='=';
                ans[j][i]='=';
                continue;
            }

            if(disi == false)
            {
                ans[i][j] = '+';
                ans[j][i] = '-';
                disi = true;
            }else if(disi == true)
            {
                ans[i][j] = '-';
                ans[j][i] = '+';
            }
        }
    }


    for (int i = 0; i < n; i++)
    {
        for (int j = 0; j < n; j++)
        {
            cout << ans[i][j];
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