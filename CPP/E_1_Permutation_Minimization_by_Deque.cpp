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
    vector<int> v;
    v.resize(n,0);
    for(int i = 0; i < n; i++) cin >> v[i];

    deque<int> q;
    q.push_back(v[0]);
    for(int i = 1; i < n; i++)
    {
        if(q.front() < v[i]) q.push_back(v[i]);
        else q.push_front(v[i]);
    }
    while(!q.empty())
    {
        cout << q.front() << " ";
        q.pop_front();
    }
    printf("\n");
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}