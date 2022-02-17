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
    vector<int> one;
    for(int i = 0; i < n; i++)
    {
        if(str[i] == '1')
        {
            one.push_back(i);
        }
    }

    bool order = true;
    for(int i = 1; i < n; i++)
    {
        if(str[i] < str[i-1]) order = false;
    }
    if(!order)
    {

        set<int> v;
        int j = 0;
        for(int i = n-1; i >= 0; i--)
        {
            if(str[i] == '1') continue;
            else
            {
                if(one.size()>j && one[j] < i)
                {
                    v.insert((one[j]+1));
                    v.insert(i+1);
                    j++;
                }
            }
        }
        cout << 1 << endl;
        cout << v.size() << " ";
        for(auto x : v) cout << x << " ";
        cout << endl;
    }else
        cout << 0 << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}