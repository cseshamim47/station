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
    int cnt = 0;
    vector<int> v;
    vector<int> m;

    while(true)
    {
        if(cnt%2 == 0)
        {
            v.push_back(1);
            m.push_back(2);
            cnt++;
        }else
        {
            cnt++;
            v.push_back(2);
            m.push_back(1);
        }

        int sum1 = accumulate(v.begin(),v.end(),0);
        int sum2 = accumulate(m.begin(),m.end(),0);
        if(sum1 == n && sum2 == n) 
        {
            for(auto x : m) cout << x;
            cout << endl;
            return;
        }else if(sum1 == n)
        {
            for(auto x : v) cout << x;
            cout << endl;
            return;
        }else if(sum2 == n)
        {
            for(auto x : m) cout << x;
            cout << endl;
            return;
        }
    }

    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}