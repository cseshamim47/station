#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int x,y;
    cin >> x >> y;
    int n;
    cin >> n;
    vector<int> hrDown(n,0);
    for(int i = 0; i < n; i++) cin >> hrDown[i];
    cin >> n;
    vector<int> hrUp(n,0);
    for(int i = 0; i < n; i++) cin >> hrUp[i];
    cin >> n;
    vector<int> vrLeft(n,0);
    for(int i = 0; i < n; i++) cin >> vrLeft[i];
    cin >> n;
    vector<int> vrRight(n,0);
    for(int i = 0; i < n; i++) cin >> vrRight[i];

    cout << max({abs(hrDown[hrDown.size()-1] - hrDown[0])*y,abs(hrUp[hrUp.size()-1] - hrUp[0])*y, (vrLeft[vrLeft.size()-1]-vrLeft[0])*x,(vrRight[vrRight.size()-1]-vrRight[0])*x}) << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}