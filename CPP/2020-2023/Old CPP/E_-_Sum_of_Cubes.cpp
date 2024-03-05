#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

vector<int> qube;
void qubes()
{
    int x = 1;
    int n = pow(x,3);
    while(n <= 1e12)
    {
        qube.push_back(n);
        x++;
        n = pow(x,3);
    }
}
void solve()
{
    int x;
    cin >> x;
    int b = 0;
    for(int i = 0; qube[i] <= x && i < qube.size(); i++)
    {
        int a = qube[i];
        b = x-a;
        if(binary_search(qube.begin(),qube.end(),b))
        {
            cout << "YES" << endl;
            return;
        }
    }
    cout << "NO" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    qubes();
    w(t)
    //solve();
}