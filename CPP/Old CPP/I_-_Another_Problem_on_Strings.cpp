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
    
    int prefix[str.size()]{0};
    int zcnt = 0;
    int cnt = 0;
    for(int i = 0; i < str.size(); i++)
    {
        if(n==0)
        {
            if(str[i] == '0')
            {
                zcnt++;
            }else
            {
                cnt += zcnt*(zcnt+1)/2;
                zcnt = 0;
            }
        }

        if(i == 0)
        {
            if(str[i] == '1')
            prefix[i] = 1;
            else prefix[i] = 0;
        }else if(str[i] == '1')
        {
            prefix[i] += prefix[i-1]+1;
        }else
        {
            prefix[i] += prefix[i-1];
        }
    }
    
    cnt += zcnt*(zcnt+1)/2;
    if(n != 0)
    for(int i = 0; i < str.size(); i++)
    {
        if(i == 0)
        {
            cnt = upper_bound(prefix,prefix+str.size(),n) - lower_bound(prefix,prefix+str.size(),n);
        }else
        {
            cnt += upper_bound(prefix,prefix+str.size(),n+prefix[i-1]) - lower_bound(prefix,prefix+str.size(),n+prefix[i-1]);
        }
    }
    cout << cnt << endl;

    // for(int i = 0; i < str.size(); i++)
    // {
    //     cout << prefix[i] << " ";
    // }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
}