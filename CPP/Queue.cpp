#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int query,quantum;
    cin >> query >> quantum;

    queue<pair<string,int>> work;
    for(int i = 0; i < query; i++)
    {
        string name; int duration;
        cin >> name >> duration;
        work.push({name,duration});
    }

    int time = 0;
    while(work.empty() != true)
    {
        auto currentWork = work.front();
        if(currentWork.second > quantum)
        {
            int rest = currentWork.second - quantum;
            work.push({currentWork.first,rest});
            time+=quantum;
        }
        else
        {
            time += currentWork.second;
            cout << currentWork.first << " " << time << endl; 
        }
        work.pop();
    }
}

int32_t main()
{
      //        Bismillah
    // w(t)
    solve(); 
}