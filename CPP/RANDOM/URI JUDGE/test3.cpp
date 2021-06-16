#include <iostream>
using namespace std;

int main()
{
    int m, test_case = 0;
    char str[1000];
    while(++test_case)
    {
        int i, ans = 0, num = 0, cndtn = 1;
        cin >> m;
        if(m==0){
            break;
        }
        cin >> str;
        for(i = 0; str[i]; i++){
            if(str[i]=='-'){
                if(cndtn == 0) ans -= num;
                else ans += num;
                cndtn = 0; num = 0;
            }
        }

    }
}