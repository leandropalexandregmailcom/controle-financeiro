var arr = [1,2,3,4,5,6,7]
var k = 3

function soma(arr, k)
{
	for(i = 0; i < arr.length; i++)
	{
		for(j = arr.length; j > 0; j--)
        {
            if(arr[j] + arr[i] == k)
            {
               return true;
            }
        }

        console.log('Valor não encontrado')
	}
}
