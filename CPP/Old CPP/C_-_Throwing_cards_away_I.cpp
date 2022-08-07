#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}

int Case;
void solve()
{
    int n;
    while(cin >> n)
    {
        if(n == 0) return;
        deque<int> q;
        for(int i = 1; i < n+1; i++) q.push_back(i);

        int cnt = 0;
        cout << "Discarded cards:";
        // if(q.size() == 1)
        // {
        //     cout << q.front();
        //     q.pop_front();
        // }
        while(q.size() > 1)
        {
            if(!cnt) cout << " ";
            if(cnt) cout << ", ";
            cout << q.front();
            q.pop_front();
            q.push_back(q.front());
            q.pop_front();
            cnt++;
        }
        cout << endl;
        cout << "Remaining card:";
        if(q.size())
        {
            cout << " ";
            cout << q.front();
        }
        cout << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}