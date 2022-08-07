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
    string arr[n-2];
    for(int i = 0; i < n-2; i++)
    {
        cin >> arr[i];
    }

    string s = arr[0];

    for(int i = 1; i < n-2; i++)
    {
        int sz = s.size() - 1;

        if(s[sz] == arr[i][0]) s+=arr[i][1];
        else
        {
            s+=arr[i][0];
            s+=arr[i][1];
        }
    }

    if(s.size() == n) cout << s << endl;
    else
    {
        if(s[s.size()-1] == 'a') s += 'b';
        else s += 'a';

        cout << s << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}