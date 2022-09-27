#include <bits/stdc++.h>
using namespace std;

#define endl "\n"
#define fo(i,n) for(int i=0; i < n; i++)

void solve()
{
    int n;
    cin >> n;
    string str;
    cin >> str;

//    _Hello_Vasya(and_Petya)__bye_(and_OK)

    bool ok = false;
    int ch = 0;
    int chMax = 0;
    int word = 0;
    for(int i = 0; i < n; i++)
    {
        if(str[i] == '(')
        {
            ok = true;
            chMax = max(ch,chMax);
            ch = 0;
        }
        else if(str[i] == ')') ok = false;
        else if(!ok)
        {
            if(str[i] != '_') ch++;
            else
            {
                chMax = max(ch,chMax);
                ch = 0;
            }

        }else if(ok)
        {
            if(str[i] != '_' && (str[i+1] == '_' || str[i+1] == ')')) word++;
        }


    }

    chMax = max(ch,chMax);

    cout << chMax << " " << word << endl;


}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;

}
