#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    vector<int> et(n+1,0);
    for(int i = 0; i <= n; i++)
    {
        et[i] = i;
    }       

    cout << 1 << " : " << et[1] << endl;
    for(int p = 2; p <= n; p++) // nloglogn
    {
        if(et[p] == p)
        {
            for(int m = p; m <= n; m+=p)
            {
                et[m] = et[m]/p;
                et[m] *= (p-1);
            }
        }
        cout << p << " : " <<  et[p] << endl;
    }


}