#include <bits/stdc++.h>
using namespace std;

int main()
{
    //    Bismillah
    int n;
    cin >> n;
    vector<int> v(n);
    for(int i = 0; i < n; i++)
    {
        cin >> v[i];
    }

    int ans = 0;
    for(int i = 0; i < n-1; i++)
    {

        if((v[i] == 2 && v[i+1] == 3) || (v[i] == 3 && v[i+1] == 2))
        {
            cout << "Infinite" << endl;
            return 0;
        }

        if(v[i] == 1 && v[i+1] == 2) // circle er moddhe triangle
        {
            ans+=3;
        }

        if(v[i] == 1 && v[i+1] == 3) // circle er moddhe square
        {
            ans += 4;
        }

        if(v[i] == 2 && v[i+1] == 1) // triangle er moddhe circle
        {
            ans += 3;
        }

        if(v[i] == 3 && v[i+1] == 1) // square er moddhe circle
        {
            ans += 4;
        }

        if(i >= 2)
        {
            if(v[i] == 2 && v[i-1] == 1 && v[i-2] == 3)
            {
                ans--;
            }
        }

    }
    if(n >= 2 && v[n-1] == 2 && v[n-2] == 1 && v[n-3] == 3)
    {
        ans--;
    }

    cout << "Finite" << endl;
    cout << ans << endl;


}