#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int initialPos,totalSteps;
    cin >> initialPos >> totalSteps;
    int startFrom = totalSteps-(totalSteps%4)+1;

    for(int i = startFrom; i<=totalSteps; i++)
    {
        if(initialPos%2 == 0) initialPos-=i;
        else initialPos+=i;
    }
    cout << initialPos << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}