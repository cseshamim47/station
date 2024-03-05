#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    set<int> s;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        if(s.find(x) != s.end()) cout << x << endl;
        else s.insert(x);
    }
}

int32_t main()
{
    w(t)
    
}