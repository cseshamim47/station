#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int s,t,k;
    cin >> s >> t >> k;

    int steps = k;
    int stickForCoal = k*t;
    int stickMakingStep = ceil(stickForCoal*1.00/(s-1));
    steps+=stickMakingStep;

    int totaLStickMade = stickMakingStep*(s-1);
    totaLStickMade++;

    int stickLeft = totaLStickMade - stickForCoal;
    if(stickLeft < k)
    {
        k-=stickLeft;
        int stepsForOnlySticks = ceil(1.00*k/(s-1));
        // stepsForOnlySticks--;
        steps += stepsForOnlySticks; 
    }

    cout << steps << endl;




    

    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}